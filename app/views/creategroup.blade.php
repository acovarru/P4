@extends('master')
@section('header')
<h1>Test Create group</h1>
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

<form method="post">
    <br>
    Group name <input type="text" name="conversation" size="10">
    <input type="submit" value="submit"><br>
</form>  

@stop




