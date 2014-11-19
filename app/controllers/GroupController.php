<?php

class GroupController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
    
        public function __construct() {
         
        $this->beforeFilter('csrf', array('on' => 'post'));
    } 

    # This is an action...
    public function getCreateGroup() {
    
     
       
           return View::make('/creategroup');
  

    }

    # This is an action...
    public function postCreateGroup() {
   
        $room = new Room;
        $room->name = $_POST['name'];
        $room->admin=Auth::user()->email;
        $room->save();
        
          return Redirect::to('/')->with('flash_message', 'Group created!');


    }
    
    
    public function getGroup($id) {
        
    return View::make('/room')->with('id', $id);
   
    }
    
    public function postGroup($id) {
        
    $test = new Test();

    # Set 
    # this can be set later to have a conversation name, create conversations or chats
   // $test->conversation = $_POST['conversation'];
    $test->message = $_POST['message'];
    $test->user=Auth::user()->email;
    $test->room_id = $id;
    # This is where the Eloquent ORM magic happens
    $test->save();
    $room=$test->room_id;
    //echo 'message saved on db';
   // return Redirect::to(Route::input('room'))->with('id', $id);
    return View::make('/room')->with('id', $id);
   
    }
    
    
    public function getGroups() {
        
    return View::make('/groups');
   
    }
    
    # This is an action...
    public function getEditGroup($id) {
    
     
       
            return View::make('/editgroup')->with('id', $id);
  

    }
    
    # This is an action...
    public function postEditGroup($id) {
    
      $keyword=Input::get('keyword');
       
       $users=DB::table('users')->where('email','LIKE','%'.$keyword.'%')->get();
       var_dump('search results');
       
     foreach ($users as $user) {
         var_dump($user->email);
   
       }
        return View::make('/editgroup')->with('id', $id);
       
    }
    
   

}
