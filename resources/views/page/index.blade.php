@extends('app')


@section('jumbotron')

<h1>Welcome to DeviantCirs</h1><h3>Home of the best artists on the web</h3>

@endsection


@section('content')

<h2>Featured artists</h2>
<div class="row">
	@foreach ($graphics as $graphic)
	<div class="col-md-4">
		<a href="users/{{$graphic->user->id}}"><h4>{{$graphic->user->name}}</h4>
		<img style="width:300px;" src="{{$graphic->graphic_url}}" /></a>
	</div>
	@endforeach

</div>

@endsection