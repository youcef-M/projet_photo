<?php
	
	class UserTableSeeder extends Seeder {

		public function run(){
			
			DB::table('users')->insert(array(
				'username' => 'youcef',
				'password' => Hash::make('youcef'),
				'email' => 'youcef@c9.io',
				'active' => 1,
				'token' => ''
			));
			
			DB::table('users')->insert(array(
				'username' => 'mathieu',
				'password' => Hash::make('mathieu'),
				'email' => 'mathieu@c9.io',
				'active' => 1,
				'token' => ''
			));
			
			DB::table('users')->insert(array(
				'username' => 'benjamin',
				'password' => Hash::make('benjamin'),
				'email' => 'benjamin@c9.io',
				'active' => 1,
				'token' => ''
			));
			

		}
	}