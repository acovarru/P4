@extends('master')
@section('header')
<h1>Testing Automation Depot</h1>
<h2>Home</h2>
@stop
@section('content')

 
<?php
if(Auth::check()){
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-primary" href="/creategroup">Create a Group</a>';
               echo '<br>';
               echo '<br>';
               echo '<a class="pure-button pure-button-primary" href="/message">Open Group</a>';
               echo '<br>';
               echo '<br>'; 
               echo '<a class="pure-button pure-button-primary" href="/groups">Groups</a>';
               echo '<br>';
               echo '<br>'; 
               echo '<a class="pure-button pure-button-primary" href="/logout">Log Out</a>';
               echo '<br>';
               echo '<br>'; 
}
    
       else{
               echo ''.'<br>';
               echo '<a class="pure-button pure-button-primary" href="/signup">Sign Up</a>';
               echo '<br>';
               echo '<br>';
               echo '<a class="pure-button pure-button-primary" href="/login">Log In</a>';
               echo '<br>';
               echo '<br>';  
       }

               
               
            

    ?>
<!--p>Developer's<p-->
<!--h2 class="content-subhead">Create Lorem </h2-->
<!--p>
    On
</p-->



@stop 