<?php

use App\Entities\Ticket;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketTableSeeder extends BaseSeeder {

	protected $total = 100;

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
}