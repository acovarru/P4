@extends('master')
@section('header')
<h1>Testing Automation Depot</h1>
<h2>Add user to group</h2>
@stop
@section('content')
<h2 class="content-subhead">Testing Automation Depot</h2>
<p>
    Add user to group interface
</p>

<?php

  $room = DB::table('rooms')->where('id', $id)->first();
  $keyword=Input::get('keyword');
  $users=DB::table('users')->where('email','LIKE','%'.$keyword.'%')->get();
   
?>


{{ Form::open(array('route.name' => '$test->room_id')) }}

    
    
  
    Add users<br>
  {{ Form::text('keyword', null,array('placeholder'=>'search by keyword')) }}<br><br>
  
  {{ Form::submit('Submit') }}<br><br>
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