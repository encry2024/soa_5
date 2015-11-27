<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UserSeeder');
		$this->call('RolesAndPermissionsSeeder');
		// $this->call('UserTableSeeder');
	}

}
