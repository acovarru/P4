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

  $room = DB::table('rooms')->where('id', $id)->first();
  $name=$room->name;
  $description=$room->description;

  $keyword=Input::get('keyword');
  $users=DB::table('users')->where('email','LIKE','%'.$keyword.'%')->get();
   
?>


{{ Form::open(array('route.name' => '$test->room_id')) }}

    Change group name<br>
    {{ Form::text('name', $name ) }}<br><br>
    Change group description<br>
    {{ Form::text('description', $description, ['size' => '40x3']) }}<br><br>
    <?php

               echo '<a class="pure-button" href="/adduser/'.$id.'">Edit Users</a>';

?>
    <br><br>
    {{ Form::submit('Submit') }}<br><br>
{{ Form::close() }}

@stop