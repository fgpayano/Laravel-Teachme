<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

	protected $fillable = ['title', 'status', 'user_id'];

}
