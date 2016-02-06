<?php

use Faker\Factory as Faker;
use Faker\Generator;
use illuminate\DataBase\Seeder;
use Illuminate\Support\Collection;

abstract class BaseSeeder extends Seeder{
	
	protected $total = 500;

	protected static $pool = array();

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

		return $this->addToPool($this->getModel()->create($values));
	}

	protected function createFrom($seeder, array $customValues = array())
	{
		$seeder = new $seeder;

		return $seeder->create($customValues);
	}

	protected function getRandomId($model)
	{
		if (! $this->collectionExist($model))
		{
			throw new Exception("The {$model} Collection does not exist.");
		}

		return static::$pool[$model]->random();
	}

	private function addToPool($entity)
	{
		$reflection = new reflectionClass($entity);

		$class = $reflection->getShortName();

		if (! $this->collectionExist($class))
		{
			static::$pool[$class] = new Collection();
		}

		static::$pool[$class]->push($entity->id);

		return $entity;
	}

	protected function collectionExist($class)
	{
		return isset(static::$pool[$class]);
	}


	public function run()
	{
		$this->createMultiple($this->total);
	}

}