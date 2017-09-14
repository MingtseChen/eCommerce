<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
//@property string $password
//* @property string $name
//* @property string $email
//* @property string $remember_token
//* @property \Carbon\Carbon $created_at
//* @property \Carbon\Carbon $updated_at
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker::create();
	    for ($i=0; $i < 50; $i++) {
		    DB::table('users')->insert([
			    'name' => $faker->name(),
			    'email' => $faker->email,
			    'password' => bcrypt($faker->password(6)),
		    ]);
	    }
    }
}
