<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Auth;
use Response;

use Illuminate\Http\Request;

class GraphicsController extends Controller {

	/** __construct function
	* Authentication for all except index and show.
	*
	* @return Response
	*/
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show', 'like', 'tags']]);	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$no_graphics = \App\Graphic::count();

		$graphics = \App\Graphic::all();
		return view('graphic.index', compact('no_graphics', 'graphics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('graphic.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$user_id = Auth::user()->id;

		$input = array_add($input, 'user_id', $user_id);

		$newgraphic = \App\Graphic::create($input);

		return Redirect::route('graphics.show', $newgraphic->id)->with('message', 'Graphic created.')
																->with('graphic', $newgraphic);

	}

	/**
	 * Display the select graphic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$graphic = \App\Graphic::find($id);
		$tags = $graphic->tags; 
		$tags = array_map('trim', explode(',',$tags));

		return view('graphic.show', compact('graphic', 'tags'));
	}

	/** like function
	* Add a liek.
	*
	* @return Response
	*/
	public function like()
	{
		$new_likes = Input::get( 'new_likes' );
		$graphic_id = Input::get( 'id' );

		$graphic = \App\Graphic::find($graphic_id);

		$graphic->likes = $new_likes;

		$graphic->update();


		$response = array(
            'status' => 'success',
            'msg' => 'Thank you!',
        );
 
        return Response::json( $response );	
	}
	
	/** tags function
	* Display all content matching selected tags.
	*
	* @return Response
	*/
	public function tags($tag)
	{
		$graphics = \App\Graphic::where('tags', 'LIKE', '%'. $tag .'%')->get();
		

		return view('graphic.tags', compact('graphics', 'tag'));
	}
	
	
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$graphic = \App\Graphic::find($id);
		return view('graphic.edit',compact('graphic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$graphic = \App\Graphic::find($id);

		$graphic->update($input);

		return Redirect::route('graphics.show', $graphic->id)->with('message', 'Graphic updated.');
																
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	$graphic = \App\Graphic::find($id);
	$graphic->delete();
 
	return Redirect::route('graphics.index')->with('message', 'Project deleted.');

	}

}
