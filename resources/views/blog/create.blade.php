@extends('app')

@section('content')
<h1>Create Blog Post</h1>

@if(Session::has('message'))
    <div class="alert alert-info">
        {{{ Session::get('message') }}}
    </div>
@endif

<ul>
    @foreach($errors->all() as $error)
        <li>{{{ $error }}}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'blogadmin_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Title') !!}
    {!! Form::text('title', null,
    array('required',
    'class'=>'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('body') !!}
    {!! Form::text('body', null,
    array('required',
    'class'=>'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create post!',
    array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
@endsection