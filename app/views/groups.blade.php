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

$rooms = DB::table('rooms')->orderBy('id', 'desc')->take(5)->get();

        foreach(array_reverse($rooms) as $room) {
            //$user = new User;
          //  echo "<font color='steelblue' size='5'>$room->name<br></font>";
            if( $room->admin==Auth::user()->email){
                //echo "This user can edit group";
                echo ''.'<br>';
              //  echo '<h1><a href="/'.$room->id.'">'. $room->name . '</a></h1>'; 
               echo '<a class="pure-button pure-button-primary" href="'.$room->id.'">'.$room->name.'</a>';
               echo ' ';
               echo '<a class="pure-button" href="'.$room->id.'">Edit</a>';
               echo ' ';
               echo '<a class="pure-button" href="'.$room->id.'">Delete</a>';
               echo ''.'<br>';
            }
            else{
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-primary" href="'.$room->id.'">'.$room->name.'</a>';
               echo ''.'<br>';
            }
       
        }
 
    ?>


@stop




