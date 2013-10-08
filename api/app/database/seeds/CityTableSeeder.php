<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */

class CityTableSeeder extends Seeder {

        public function run() {
            DB::table('city')->delete();

            City::create(array(
                'name' => 'São José dos Campos',
                'state' => 'SP',
            ));
        }

}