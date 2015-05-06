<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;


use Illuminate\Http\Request;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$user = \App\User::orderByRaw("RAND()")->take(3)->get();
		$users = \App\User::count();
		$lastuser = \App\User::orderBy('id', 'desc')->first()->id;

		
		$graphics = $this->generate_graphics($lastuser);
			
		/*foreach ($user as $user) {
			$graphics[] = $user->graphics->first();
		}*/

		return view("page.index",compact('graphics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	/** Generate graphics function
	* Generates random users and fetches their graphics.
	*
	* @return Response
	*/

	public function generate_graphics($no_users)
	{
		$rnum_selected = [];
		$i = 1;

		while ($i <= 3) {
			$rnum = rand(1, $no_users);
			echo $rnum;
			if (!in_array($rnum, $rnum_selected)) {
				$rnum_selected[] = $rnum;
				$user = \App\User::find($rnum); 
				
				if($user != null){
					if(!$user->graphics->isEmpty()){
						$graphics[] = $user->graphics->first();
						$i++;
					}
				}
			}
		}	
		return $graphics;
	}

	/** generate_graphics function
	* Generate random users and their graphics.
	*
	* @return Response
	*/
	public function generate_graphics2($no_users)
	{
		$rnum_selected = [];
		$i = 1;
		while ($i <= 3) {
			$rnum = rand(1, $no_users);
			if (!in_array($rnum, $rnum_selected)) {
				$rnum_selected[] = $rnum;
				$graphic = \App\Graphic::where('user_id', '=', $rnum);
				if($graphic->exists()){
					$graphics[] = $graphic->get()->first();
					$i++;
				}
			}

		}
		return $graphics;	
	}
	
	

}
