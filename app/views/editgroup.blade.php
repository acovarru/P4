@extends('master')
@section('header')
<h1>Zap Messenger</h1>
<h2>Edit a group</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Edit group interface
</p>

<?php

$users = User::all();


  $room = DB::table('rooms')->where('id', $id)->first();
  $name=$room->name;

foreach ($users as $user) {
    $categories[]=$user->email ;
}
?>

{{ Form::open(array('url' => '/editgroup')) }}

    Change group name<br>
    {{ Form::text('name', $name ) }}<br><br>
    Add users<br>
    {{ Form::select('invite', $categories) }}<br><br>
    
  {{ Form::text('keyword', null,array('placeholder'=>'search by keyword')) }}<br><br>
  
    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop




