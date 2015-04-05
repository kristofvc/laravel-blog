@extends('app')

@section('content')
<h1>Contact</h1>

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

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name', null,
    array('required',
    'class'=>'form-control',
    'placeholder'=>'eg. Slim Shady')) !!}
</div>

<div class="form-group">
    {!! Form::label('E-mail') !!}
    {!! Form::text('email', null,
    array('required',
    'class'=>'form-control',
    'placeholder'=>'eg. slim@shady.com')) !!}
</div>

<div class="form-group">
    {!! Form::label('Message') !!}
    {!! Form::textarea('message', null,
    array('required',
    'class'=>'form-control',
    'placeholder'=>'What would you like to say?')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Contact Us!',
    array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
@endsection