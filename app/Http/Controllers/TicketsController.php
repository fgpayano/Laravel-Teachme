<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Ticket;

class TicketsController extends Controller {

	public function latest()
	{
		$tickets = Ticket::orderBy('created_at', 'DESC')->paginate(10);

		return view('tickets/list', compact('tickets'));
	}

	public function popular()
	{
		dd('popular');
	}

	public function open()
	{
		dd('open');
	}

	public function closed()
	{
		dd('closed');
	}

	public function details($id)
	{
		$ticket = Ticket::findOrFail($id);

		return view('tickets/details', compact('ticket'));
	}
}
