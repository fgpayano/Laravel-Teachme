<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Entity {

	protected $fillable = ['website', 'comment', 'user_id', 'ticket_id'];

	public function ticket()
	{
		return $this->belongsTo(Ticket::getClass());
	}

	public function user()
	{
		return $this->belongsTo(User::getClass());
	}
}
