<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Entities\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
	
class VotesController extends Controller {

	public function submit($id)
	{
		$ticket = Ticket::findOrFail($id);

		currentUser()->vote($ticket);

		return redirect()->back();
	}

	public function destroy($id)
	{
		$ticket = Ticket::findOrFail($id);

		currentUser()->unvote($ticket);
	
		return redirect()->back();
	}

}
