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
        $room->description = $_POST['description'];
        $room->admin=Auth::user()->email;
        $room->users=Auth::user()->email.",";
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
    
       $update_name=DB::table('rooms')
            ->where('id', $id)
            ->update(array('name' => $_POST['name']));
       
        $update_description=DB::table('rooms')
            ->where('id', $id)
            ->update(array('description' => $_POST['description']));
    
      //  return View::make('/editgroup')->with('id', $id);
        return Redirect::to('/groups')->with('flash_message', 'Group Updated');
       
    }
    
    public function getDeleteGroup($id) {

    # Delete group
    DB::table('rooms')->where('id', $id)->delete();

    # Send them to the homepage
    return Redirect::to('/groups')->with('flash_message', 'Group Deleted');
    
    }
    
    
    
    public function getAddUsertoGroup($id) {
    
     
       
            return View::make('/adduser')->with('id', $id);
  

    }
    
    # This is an action...
    public function postAddUsertoGroup($id) {
    
    
        return View::make('/adduser')->with('id', $id);
       // return Redirect::to('/groups')->with('flash_message', 'Group Updated');
       
    }

}
