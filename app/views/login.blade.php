@extends('master')
@section('header')
<h1>Testing Automation Depot</h1>
<h2>Log in</h2>
@stop
@section('content')
<h2 class="content-subhead">Testing Automation Depot</h2>
<p>
    Log in interface
</p>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




