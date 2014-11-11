@extends('master')
@section('header')
<h1>Zap Messenger</h1>
<h2>Create a group</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Create group interface
</p>

<?php
//$tests = Test::all();
//$tests = DB::table('tests')->orderBy('id', 'desc')->take(5)->get();

    
    ?>

{{ Form::open(array('url' => '/creategroup')) }}

    Group name<br>
    {{ Form::text('name') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




