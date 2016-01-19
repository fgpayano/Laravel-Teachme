<?php

use App\Entities\Ticket;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketTableSeeder extends BaseSeeder {

	public function getModel()
	{
		return new Ticket();
	}

	public function getDummyData(Generator $faker)
	{
		return [	
			"title" => $faker->sentence(),
			"status" => $faker->randomElement(["open", "closed"]),
			"user_id" => $this->getRandomId("User")
		];
	}

	public function run ()
	{
		$this->createMultiple(500);
	}

}