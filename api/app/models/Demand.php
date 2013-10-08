<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */

class Demand extends Eloquent {

    protected $table = 'demand';

    protected $hidden = array('pivot');

    public $timestamps = false;

    public static $blood_types = array('A+','B+','AB+','O+','A-','B-','AB-','O-');

    public function locations()
    {
        return $this->belongsToMany('Location');
    }

}