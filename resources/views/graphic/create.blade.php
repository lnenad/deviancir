@extends('app')

@section('jumbotron')
<h3>Add a new graphic</h3>
@endsection


@section('content')
{!! Form::model(new App\Graphic, ['route' => ['graphics.store']]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', '', array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
            {!! Form::label('graphic_url', 'URL: ') !!}
            {!! Form::text('graphic_url', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags', '') !!}
            {!! Form::text('tags', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description','', array('class' => 'form-control', 'rows' => '5')) !!}
        </div>
        	{!!Form::submit('Add a new graphic', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection