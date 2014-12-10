@extends('master')
@section('header')
<h1>Zap Messenger</h1>
<h2>Groups</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Groups interface
</p>
<!--h>
{{ Form::open(array('url' => '/message')) }}
 #   {{ Form::submit('History') }}
#{{ Form::close() }}
</h-->
<?php

$rooms = DB::table('rooms')->orderBy('id', 'desc')->get();

        foreach(array_reverse($rooms) as $room) {
            //$user = new User;
          //  echo "<font color='steelblue' size='5'>$room->name<br></font>";
            if( $room->admin==Auth::user()->email){
                //echo "This user can edit group";
                echo ''.'<br>';
              //  echo '<h1><a href="/'.$room->id.'">'. $room->name . '</a></h1>'; 
               echo '<a class="pure-button pure-button-primary" href="/group/'.$room->id.'">'.$room->name.'</a>';
               echo ' ';
               echo '<a class="pure-button" href="/editgroup/'.$room->id.'">Edit</a>';
               echo ' ';
               echo '<a class="pure-button" href="/deletegroup/'.$room->id.'">Delete</a>';
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-disabled" href="/group/'.$room->id.'">'.$room->description.'</a>';
               echo ''.'<br>';
            }
            else{
                
                 if(strpos($room->users,Auth::user()->email) !== false){
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-primary" href="/group/'.$room->id.'">'.$room->name.'</a>';
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-disabled" href="/group/'.$room->id.'">'.$room->description.'</a>';
               echo ''.'<br>';
            }
            }
       
        }
 
    ?>


@stop




