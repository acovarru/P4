<?php

class MessageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Message Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	# This is an action...
    public function getMessage() {
    
     
       
            return View::make('/message');
  

    }
    
    # This is an action...
    public function postMessage() {
    
     $test = new Test();

    # Set 
    # this can be set later to have a conversation name, create conversations or chats
   // $test->conversation = $_POST['conversation'];
    $test->message = $_POST['message'];
    $test->user=Auth::user()->email;
    $test->room_id = 1;
    # This is where the Eloquent ORM magic happens
    $test->save();

    //echo 'message saved on db';
    return Redirect::to('/message');
  

    }
    
    
    public function getMessagex() {
    
     
       
            return View::make('/messagex');
  

    }
    
    public function postMessagex() {
        if(Request::ajax()) {
         $query  = Input::get('query');
            
     $test = new Test();

    # Set 
    # this can be set later to have a conversation name, create conversations or chats
   // $test->conversation = $_POST['conversation'];
    $test->message = $_POST['message'];
    $test->user=Auth::user()->email;
    $test->room_id = 1;
    # This is where the Eloquent ORM magic happens
    $test->save();

    //echo 'message saved on db';
     return $results;
  

    }
    }

}
