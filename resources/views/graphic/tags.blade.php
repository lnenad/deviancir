@extends('app')


@section('jumbotron')

<h2>Displaying all graphics containing tag: {{$tag}}</h2>

@endsection


@section('content')

<div class="row">
	@if (!$graphics->count())
		<div class="col-md-6 bg-warning">
			<h3>There are no graphics containing: {{$tag}}</h3>
		</div>
	@else
		@foreach ($graphics as $graphic)
		<div class="col-md-3">
			<a href="{{route('users.show',$graphic->user->id)}}"><h4>{{$graphic->user->name}}</h4></a>
			<a href="{{route('graphics.show',$graphic->id)}}"><img style="width:200px;" src="{{$graphic->graphic_url}}" /></a>
		</div>
		@endforeach
	@endif

</div>

@endsection