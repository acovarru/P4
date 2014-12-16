@extends('master')
@section('header')
<h1>Testing Automation Depot</h1>
<h2>Create an account</h2>
@stop
@section('content')
<h2 class="content-subhead">Testing Automation Depot</h2>
<p>
    Sign up interface
</p>



{{ Form::open(array('url' => '/signup')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@foreach($errors->all() as $message) 
    <div class='error'>{{ $message }}</div>
@endforeach

@stop






