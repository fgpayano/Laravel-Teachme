<?php namespace App\Entities;

class Ticket extends Entity {

	protected $fillable = ['title', 'status', 'user_id'];
	
	public function author()
	{
		return $this->belongsTo(User::getClass());
	}

	public function comments()
	{
		return $this->hasMany(TicketComment::getClass());
	}

	public function voters()
	{
		return $this->belongsToMany(User::getClass(), 'ticket_votes');
	}

	public function getOpenAttribute()
	{
		return $this->status == "open";
	}
}