@extends('master')
@section('header')
<h1>Testing Automation Depot</h1>
<h2>Create a group</h2>
@stop
@section('content')
<h2 class="content-subhead">Testing Automation Depot</h2>
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
    Group description<br>
    {{ Form::text('description', null, ['size' => '40x3']) }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




