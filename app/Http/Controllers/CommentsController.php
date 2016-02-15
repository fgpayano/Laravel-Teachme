<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\TicketComment;
use App\Entities\Ticket;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Http\Requests;

class CommentsController extends Controller {

	public function submit($id, Request $request, Guard $auth)
	{
		$this->validate($request, [
			'comment' => 'required|max:250',
			'website'    => 'url'
		]);

		$comment = new TicketComment($request->all());

		$comment->user_id = $auth->id();

		$ticket = Ticket::findOrfail($id);

		$ticket->comments()->save($comment);

		session()->flash('success', 'Tu comentario fue guardado exitosamente');

		return redirect()->back();
	}

}
