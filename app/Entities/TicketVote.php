<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketVote extends Entity {

	protected $fillable = ['user_id', 'ticket_id'];
	
	public function ticket()
	{
		return $this->belongsTo(Ticket::getClass());
	}

	public function user()
	{
		return $this->belongsTo(User::getClass());
	}
}
