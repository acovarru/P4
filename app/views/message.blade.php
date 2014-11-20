@extends('master')
@section('header')
<h1>Zap Messenger</h1>
<h2>Conversation</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Send message interface
</p>
<!--h>
{{ Form::open(array('url' => '/message')) }}
 #   {{ Form::submit('History') }}
#{{ Form::close() }}
</h-->
<?php

$tests = DB::table('tests')->orderBy('id', 'desc')->take(5)->get();

        foreach(array_reverse($tests) as $test) {
            
            if($test->room_id==1){
            //$user = new User;
            echo "<font color='steelblue'>$test->user<br></font>";
            echo $test->message.'<br>';
            //echo ''.'<br>';
            //echo 'sent on:'.$test->created_at.'<br>';
            echo "<font color='lightgray'>$test->created_at<br></font>";
            //echo "<font color='red'>Roses are red</font>";
            echo ''.'<br>';
            } 
        }
 
    ?>
 

{{ Form::open(array('url' => '/message')) }}

    <br>
    {{ Form::textarea('message', null, ['size' => '60x3']) }}<br><br>

    {{ Form::submit('Send') }}

{{ Form::close() }}

@stop




