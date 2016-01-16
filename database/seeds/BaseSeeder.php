<?php

use Faker\Factory as Faker;
use Faker\Generator;
use illuminate\DataBase\Seeder;

abstract class BaseSeeder extends Seeder{
	
	protected function createMultiple($total, array $customValues = array())
	{
		for ($i = 1; $i <= $total; $i++)
		{
			$this->create($customValues);
		}
	}

	abstract public function getModel();
	
	abstract public function getDummyData(Generator $faker);

	protected function create(array $customValues = array())
	{
		$values = $this->getDummyData(Faker::create());

		$values = array_merge($values, $customValues);

		$this->getModel()->create($values);
	}
}