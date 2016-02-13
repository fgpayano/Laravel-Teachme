<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {

	public function submit($id)
	{
		return 'Enviar comentario '. $id;
	}

}
