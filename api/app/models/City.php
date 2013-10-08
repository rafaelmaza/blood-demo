<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */

class City extends Eloquent {

    protected $table = 'city';

    public $timestamps = false;

    public function donors()
    {
        return $this->hasMany('Donor');
    }

    public function locations()
    {
        return $this->hasMany('Location');
    }

}