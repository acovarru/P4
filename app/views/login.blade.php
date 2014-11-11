@extends('master')
@section('header')
<h1>Test Log in account</h1>
<h2>Log in</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Log in interface
</p>

<?php
//$tests = Test::all();
//$tests = DB::table('tests')->orderBy('id', 'desc')->take(5)->get();

    
    ?>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




