@extends('app')


@section('jumbotron')

<h3>{{$user->name}}'s public profile</h3>

@endsection


@section('content')
<h3>Works of art</h3>
<div class="row">

	@foreach ($graphics as $graphic)
	<div class="col-md-4">
		<a href="{{route('graphics.show',$graphic->id)}}"><h4>{{$graphic->title}}</h4>
		<img style="width:300px;" src="{{$graphic->graphic_url}}" /></a>
	</div>
	@endforeach

</div>

@endsection