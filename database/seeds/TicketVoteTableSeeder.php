<?php

use App\Entities\TicketVote;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketVoteTableSeeder extends BaseSeeder {

	public function getModel()
	{
		return new TicketVote();
	}

	public function getDummyData(Generator $faker)
	{
		return [	
			"ticket_id" => $this->getRandomId("Ticket"),
			"user_id" => $this->getRandomId("User")
		];
	}
}