<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */

class DonorTableSeeder extends Seeder {

        public function run() {
            DB::table('donor')->delete();

            Donor::create(array(
                'name' => 'José da Silva',
                'email' => 'rvmazariolli+jose@gmail.com',
                'blood_type' => 'O+',
                'address' => 'Rua Palmares, 116',
                'city_id' => City::where('name', 'São José dos Campos')->first()->id,
                'zip' => '12235-620',
            ));

            Donor::create(array(
                'name' => 'Maria da Silva',
                'email' => 'rvmazariolli+maria@gmail.com',
                'blood_type' => 'AB+',
                'address' => 'Rua José Cobra, 1055',
                'city_id' => City::where('name', 'São José dos Campos')->first()->id,
                'zip' => '12237-000',
            ));
        }

}