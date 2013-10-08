<?php

class LocationController extends BaseController {

    public function index() {
        return Response::json(Location::take(50)->get());
    }

}