<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */

class Donor extends Eloquent {

    protected $table = 'donor';

    protected $with = array('city');

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('City');
    }

    public static function getRecipientBloodTypes($blood_type) {
        $abo = strtoupper(substr($blood_type, 0, strlen($blood_type)-1));
        $rh = substr($blood_type, -1);

        $compatible_abo = array();
        if($abo == 'AB') {
            $compatible_abo += array('AB-', 'A-', 'B-');
        }
        else if($abo != 'O') {
            $compatible_abo[] = $abo . '-';
        }
        $compatible_abo[] = 'O-';

        if($rh == '+') {
            $compatible_abo = array_merge($compatible_abo, array_map(function($element) {
                return str_replace('-', '+', $element);
            }, $compatible_abo));
        }
        return $compatible_abo;
    }

}