<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model {

	protected $fillable = ['website', 'comment', 'user_id', 'ticket_id'];

}
