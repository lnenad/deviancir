<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/** show function
	* Show all graphics from a single users.
	*
	* @return Response
	*/
	public function show($id)
	{
		$user = \App\User::find($id);
		$graphics = \App\Graphic::where('user_id', $id)->get();

		return view('page.users',compact('graphics','user'));		
	}
	

}
