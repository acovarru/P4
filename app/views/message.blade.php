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

<?php
//$tests = Test::all();
$tests = DB::table('tests')->orderBy('id', 'desc')->take(5)->get();

    # Make sure we have results before trying to print them...
  //  if($tests->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tests as $test) {
            //$user = new User;
            echo "<font color='steelblue'>$test->user<br></font>";
            echo $test->message.'<br>';
            //echo ''.'<br>';
            //echo 'sent on:'.$test->created_at.'<br>';
            echo "<font color='lightgray'>$test->created_at<br></font>";
            //echo "<font color='red'>Roses are red</font>";
            echo ''.'<br>';
            
        }
   // }
   // else {
      //  return 'No message found';
  //  }
    ?>
 

{{ Form::open(array('url' => '/message')) }}

    <br>
    {{ Form::textarea('message', null, ['size' => '60x3']) }}<br><br>

    {{ Form::submit('Send') }}

{{ Form::close() }}

@stop




