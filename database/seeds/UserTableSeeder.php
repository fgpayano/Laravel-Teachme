<?php

use App\Entities\User;
use Faker\Factory as Faker;
use Faker\Generator;

class UserTableSeeder extends BaseSeeder {

	public function getModel()
	{
		return new User();
	}

	public function getDummyData(Generator $faker)
	{
		return [
			"name" => $faker->name,
			"email" => $faker->email,
			"password" => bcrypt("123456")
		];
	}

	private function createAdmin()
	{
		$this->create([
			"name" => "Francis Goris Payano",
			"email" => "fgpayano@gmail.com",
			"password" => bcrypt("123456")
		]);
	}
}	