<?php

use App\Entities\TicketComment;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketCommentTableSeeder extends BaseSeeder {

	public function getModel()
	{
		return new TicketComment();
	}

	public function getDummyData(Generator $faker)
	{
		return [	
			"website" => $faker->url(),
			"comment" => $faker->paragraph(),
			"user_id" => $this->getRandomId("User"),
			"ticket_id" => $this->getRandomId("Ticket")
		];
	}
}