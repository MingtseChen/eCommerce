<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		for ($i = 0; $i < 10; $i++) {
			DB::table('products')->insert([
				'name' =>           $faker->text($maxNbChars = 20),
				'price' =>          $faker->biasedNumberBetween($min = 500, $max = 1000),
				'release_date' =>   $faker->date(),
				'auther' =>         $faker->name,
				'retailer' =>       $faker->company,
				'desc' =>           $faker->text(200),
				'ISBN' =>           $faker->isbn13,
				'pic_path' =>       $faker->imageUrl(200, 200,'cats'),
			]);
		}
	}
}
