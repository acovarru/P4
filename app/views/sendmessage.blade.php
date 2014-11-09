@extends('master')
@section('header')
<h1>Test Conversation</h1>
<h2>Conversation</h2>
@stop
@section('content')
<h2 class="content-subhead">Zap Messenger </h2>
<p>
    Send message interface
</p>
<form method="post">
    <br>
    Send Message
    <br>
    <textarea rows="4" cols="50" name="message"></textarea>
    <br>
    <input type="submit" value="send">
    <br>
</form>         
@stop




