<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('CityTableSeeder');
        $this->call('DonorTableSeeder');
        $this->call('LocationTableSeeder');
        $this->call('DemandTableSeeder');
	}

}