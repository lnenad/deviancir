@extends('app')


@section('jumbotron')

<h1>{{$graphic->title}}</h1>
<h4>By: {{$graphic->user->name}}</h4>
<h4>Tags: 
@foreach ($tags as $tag)
	<a href="/tags/{{$tag}}"><i>{{$tag}}</i></a>
@endforeach
</h4>

@endsection


@section('content')

<div class="row">
	<div class="col-md-7">
		<img style="display: block;" src="{{$graphic->graphic_url}}" />
		<a href="{{route('graphics.edit',$graphic->id)}}"><h3>Edit this graphic</h3></a>
	</div>
	<div  class="col-md-5">
	<h3>Likes: <span id="no_likes">{{$graphic->likes}}</span></h3><h4><a href="#" id="likethis">Like</a></h4>
	<span id="graphid" style="display:none;">{{$graphic->id}}</span>
	<p id="likeresult" class="bg-success" style="padding: 8px 20px 8px 20px; display:none; font-size: 19px;"></p>

	<div class="linemaker"></div>

	@if ($graphic->comments->count())
		<h3>Comments</h3>
		@foreach ($graphic->comments as $comment)
			<div id="comments">
				<h4>{{$comment->user}}</h4>
				{{$comment->text}}
			</div>
		@endforeach
		<br /><br />
		<div class="linemaker"></div>
	@endif

	<h4>New comment</h4>
	<div class="newcomment">
	{!! Form::model(new App\Comment, ['route' => ['comments.store']]) !!}
	<div class="form-group">
        {!! Form::label('user', 'Name:') !!}
	@if (Auth::user())
		{!! Form::text('user', Auth::user()->name, array('class' => 'form-control', 'readonly' => 'true'))!!}
	@else 
    	{!! Form::text('user', '', array('class' => 'form-control'))!!}
    @endif
    	</div>
        <div class="form-group">
            {!! Form::label('text', 'Comment:') !!}
            {!! Form::textarea('text','', array('class' => 'form-control', 'rows' => '3')) !!}
        </div>
        	<input type="hidden" name="graphic_id" value="{{$graphic->id}}" />
        	{!!Form::submit('Post a comment', array('class' => 'btn btn-primary')) !!}
        	
    {!! Form::close() !!}

	</div>
	
	</div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/js/likeapp.js') }}"></script>
@endsection