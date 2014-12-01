<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
    
        public function __construct() {
        $this->beforeFilter('guest', 
            array('only' => array('getLogin')));    
        $this->beforeFilter('csrf', array('on' => 'post'));
    } 

    # This is an action...
    public function getSignup() {
    
     
       
            return View::make('signup');
  

    }

    # This is an action...
    public function postSignup() {
       
            $rules = array(
            'email' => 'email|unique:users,email',
            'password' => 'min:6'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('/signup')
                            ->with('flash_message', 'Sign up failed.')
                            ->withInput()
                            ->withErrors($validator);
        }
        

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->remember_token    = "100";
            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', 'Welcome to Zap Messenger!');

        
    

    }

    # This is an action...
    public function getLogin() {

        
            return View::make('login');
  

    }

    # This is an action...
    public function postLogin() {


            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        
    

    }
    
    # This is an action...
    public function getLogout() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/login');
  

    }
    
    
    public function getAddUser($user,$id) {
        
   $current_user = DB::table('rooms')->where('id', $id)->first();

   $current_users=$current_user->users;

    # Update users
    DB::table('rooms')
            ->where('id', $id)
            ->update(array('users' => $current_users.$user.","));

    # Send them to the homepage
    return Redirect::to('/groups')->with('flash_message', 'User Added to group');
    }
    
    public function getDeleteUser($user,$id) {
        
   $current_user = DB::table('rooms')->where('id', $id)->first();

   $current_users=$current_user->users;
   
    $removed_user= str_replace($user.",", '', $current_users);

    # Update users
    DB::table('rooms')
            ->where('id', $id)
            ->update(array('users' => $removed_user));

    # Send them to the homepage
    return Redirect::to('/groups')->with('flash_message', 'User Deleted from group');
    }
}
