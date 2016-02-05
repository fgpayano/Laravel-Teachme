<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model 
{
	public static function getClass()
	{
		$class = get_class(new static);

		return $class;
	}
}