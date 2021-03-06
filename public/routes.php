<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * GET Route declared using the Route facade for index page
 * Returns view of index
 
 */
Route::get('/', function()
{
	return View::make('index');
});

 
Route::get('/message', function()
{
    
	return View::make('/message');
});



/*
 * GET Route declared using the Route facade for Base 32 Decoder page
 * 
 */
Route::post('/message', function()
{
    
 //$tests = Test::all();
	 # Instantiate a new Test model class
    $test = new Test();

    # Set 
    # this can be set later to have a conversation name, create conversations or chats
   // $test->conversation = $_POST['conversation'];
    $test->message = $_POST['message'];
   
    $test->room_id = 1;
    # This is where the Eloquent ORM magic happens
    $test->save();

    //echo 'message saved on db';
    return Redirect::to('/message');
});

Route::get('/creategroup', function()
{
       
    
	return View::make('/creategroup');
});

Route::post('/creategroup', function()
{
        $room = new Room;
        $room->name = $_POST['name'];
        $room->save();
    
	return Redirect::to('/creategroup');
});

 //$tests = Test::all();
	 # Instantiate a new Test model class
    //$test = new Test();

    # Set 
    # this can be set later to have a conversation name, create conversations or chats
   // $test->conversation = $_POST['conversation'];
   // $test->message = $_POST['message'];
   

    # This is where the Eloquent ORM magic happens
   // $test->save();

    //echo 'message saved on db';
    //return Redirect::to('/message');


Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

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
                return Redirect::to('/creategroup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/message')->with('flash_message', 'Welcome to Xap Messenger');

        }
    )
);
    
Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);
    
Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);
    
# /app/routes.php
Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});