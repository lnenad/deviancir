<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use URL;
use Redirect;

class CommentsController extends Controller {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$uri = URL::previous();

		$input = Input::all();

		$check = str_contains($uri, $input['graphic_id']);

		if ($check) {

			$newcomment = \App\Comment::create($input);
			return Redirect::route('graphics.show', $input['graphic_id']);

		} else {
			return Redirect::route($uri)->with('error', 'Invalid post URL.');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
