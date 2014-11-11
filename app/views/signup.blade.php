@extends('master')
@section('header')
<h1>Test Create account</h1>
<h2>Create an account</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Sign up interface
</p>

<?php
//$tests = Test::all();
//$tests = DB::table('tests')->orderBy('id', 'desc')->take(5)->get();

    
    ?>

{{ Form::open(array('url' => '/signup')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




