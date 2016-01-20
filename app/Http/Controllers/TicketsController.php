<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
	{
		return view('tickets/list');
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
		return view('tickets/details');
	}
}
