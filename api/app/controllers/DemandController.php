<?php

class DemandController extends BaseController {

    public function index() {
        $demands = Demand::with('locations');

        if(Request::get('blood_type') &&  in_array(strtoupper(Request::get('blood_type')), Demand::$blood_types)) {
            $demands->where('blood_type', strtoupper(Request::get('blood_type')));
        }

        return Response::json($demands->take(50)->get());
    }

    public function store() {
        if(!Request::get('title')) {
            return Response::json('You must provide a title', 422);
        }

        if(!in_array(strtoupper(Request::get('blood_type')), Demand::$blood_types)) {
            return Response::json('Invalid blood type', 422);
        }

        if(!is_array(Request::get('locations'))) {
            return Response::json('Parameter "locations" should be an array', 422);
        }

        $locations = Location::whereIn('id', Request::get('locations'))->get();
        if($locations->count() == 0) {
            return Response::json('Invalid locations', 422);
        }
		
		$demand = new Demand();
		$demand->title = Request::get('title');
		$demand->blood_type = strtoupper(Request::get('blood_type'));
		$demand->details = Request::get('details', '');
		$demand->date_entered = date('Y-m-d H:i:s');

		try {
			DB::transaction(function() use($demand, $locations) {
				$demand->save();
				$demand->locations()->attach($locations->lists('id'));
			});
		} catch(Exception $e) {
			return Response::json($e->getMessage(), 500);
		}

        $cities = array_map(function($location) {
            return $location['city']['id'];
        }, $locations->toArray());

        //let the registered donors know about the new demand
        $donors = Donor::whereIn('city_id', array_unique($cities))
            ->whereIn('blood_type', Donor::getRecipientBloodTypes($demand->blood_type))
            ->get();
        if($donors->count() > 0) {
            foreach($donors as $donor) {
                Mail::send('emails.demand.new', array('demand' => $demand, 'donor' => $donor), function($message) use($donor)
                {
                    $message->from('blood@demo02.info', 'Blood Donations');
                    $message->to($donor->email, $donor->name)->subject('New blood donation demand near you!');
                });
            }
        }

        return Response::json($demand, 200);
    }
}