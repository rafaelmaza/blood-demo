<?php

class DonorController extends BaseController {

    public function index() {
        return Response::json(Donor::take(50)->get());
    }

    public function store() {
        if(!Request::get('name')) {
            return Response::json('You must provide a name', 422);
        }

        if(!Request::get('email')) {
            return Response::json('You must provide an email address', 422);
        }

        if(!in_array(strtoupper(Request::get('blood_type')), Demand::$blood_types)) {
            return Response::json('Invalid blood type', 422);
        }

        if(!Request::get('address')) {
            return Response::json('You must provide an address', 422);
        }

        if(!Request::get('zip')) {
            return Response::json('You must provide a zip code', 422);
        }

        if(!City::find(Request::get('city'))) {
            return Response::json('You must provide a valid city', 422);
        }

        $donor = new Donor();
        $donor->name = Request::get('name');
        $donor->email = Request::get('email');
        $donor->blood_type = strtoupper(Request::get('blood_type'));
        $donor->address = Request::get('address');
        $donor->zip = Request::get('zip');
        $donor->city_id = Request::get('city');
        $donor->save();

        return Response::json($donor, 200);
    }
}