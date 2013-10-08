<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */

class DemandTableSeeder extends Seeder {

        public function run() {
            DB::table('demand')->delete();

            Demand::create(array(
                'title' => 'Doação para acidentado',
                'blood_type' => 'O+',
                'details' => 'Doação de sangue necessária para vítima de acidente',
                'date_entered' => date('Y-m-d H:i:s'),
            ))->locations()->attach(Location::get()->lists('id'));
        }

}