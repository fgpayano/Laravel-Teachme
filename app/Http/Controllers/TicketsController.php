<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Ticket;
use App\Entities\TicketComment;
use Illuminate\Auth\Guard;
use Illuminate\Routing\Redirector;

class TicketsController extends Controller {

	private $request = null; 
	private $auth = null; 
	private $redirect = null; 

	public function __construct(Request $request, Guard $auth, Redirector $redirect)
	{
		$this->request = $request;
		$this->auth = $auth;
		$this->redirect = $redirect;
	}

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

	public function create()
	{
		return view('tickets.create');
	}

	public function store()
	{
		$this->validate($this->request, [
			'title' => 'required|max:100'
		]);

		$ticket = $this->auth->user()->tickets()->create([
			'title'   => $this->request->get('title'),
			'status'  => 'open'
		]);

		return $this->redirect->route('tickets.details', $ticket->id);
	}
}
