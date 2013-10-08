<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */

class Location extends Eloquent {

    protected $table = 'location';

    protected $hidden = array('pivot', 'city_id');

    protected $with = array('city');

    public $timestamps = false;

    public function demands()
    {
        return $this->belongsToMany('Demand');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }
}