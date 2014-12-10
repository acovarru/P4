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
    {{ Form::submit('Submit') }}<br><br>
    Add users<br>
  {{ Form::text('keyword', null,array('placeholder'=>'search by keyword')) }}<br>
  

{{ Form::close() }}



<?php

       
     foreach ($users as $user) {
            echo ''.'<br>';
              //  echo '<h1><a href="/'.$room->id.'">'. $room->name . '</a></h1>'; 
               echo '<a class="pure-button pure-button-primary" href="/group/'.$user->email.'">'.$user->email.'</a>';
               echo ' ';
               
               if(strpos($room->users,$user->email) !== false){
                   echo '<a class="pure-button" href="/deleteuser/'.$user->email.'/'.$id.'">Remove</a>';
               }
               else{
                 echo '<a class="pure-button" href="/adduser/'.$user->email.'/'.$id.'">Add</a>';  
               }
             
               echo ''.'<br>';
   
       }

?>




@stop