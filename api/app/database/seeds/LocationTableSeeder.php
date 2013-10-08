<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael
 * Date: 06/10/13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */

class LocationTableSeeder extends Seeder {

        public function run() {
            DB::table('location')->delete();

            Location::create(array(
                'name' => 'Serviço de Hematologia e Hemoterapia',
                'hours' => 'Segunda a sexta-feira, das 7h às 12h30',
                'address' => 'Rua Antonio Sais, 425',
                'city_id' => City::where('name', 'São José dos Campos')->first()->id,
                'zip' => '12210-040',
            ));
        }

}