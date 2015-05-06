@extends('app')


@section('jumbotron')

<h2>Graphic showcase</h2>

@endsection


@section('content')

<div class="row">
	@foreach ($graphics as $graphic)
	<div class="col-md-3">
		<a href="{{route('users.show',$graphic->user->id)}}"><h4>{{$graphic->user->name}}</h4></a>
		<a href="graphics/{{$graphic->id}}"><img style="width:200px;" src="{{$graphic->graphic_url}}" /></a>
	</div>
	@endforeach

</div>

@endsection