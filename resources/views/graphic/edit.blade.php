@extends('app')

@section('jumbotron')
<h3>Edit a graphic</h3>
@endsection


@section('content')
{!! Form::model($graphic, ['method' => 'PATCH','route' => ['graphics.update', $graphic->id]]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, array('class' => 'form-control'))!!}
        </div>
        <div class="form-group">
            {!! Form::label('graphic_url', 'URL: ') !!}
            {!! Form::text('graphic_url', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags', '') !!}
            {!! Form::text('tags', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',null, array('class' => 'form-control', 'rows' => '5')) !!}
        </div>
        	{!!Form::submit('Edit this graphic', array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
<br />
{!! Form::model($graphic, ['method' => 'DELETE', 'route' => ['graphics.destroy', $graphic->id], 'class' => 'inline']) !!}

            {!!Form::submit('Delete this graphic', array('class' => 'btn btn-primary', 'name' => 'delete')) !!}
{!! Form::close() !!}
@endsection