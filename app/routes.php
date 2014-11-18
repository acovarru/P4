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
    $test->user=Auth::user()->email;
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
        $room->admin=Auth::user()->email;
        $room->save();
        
          return Redirect::to('/')->with('flash_message', 'Group created!');
	//return Redirect::to("/creategroup/$room->id");
});

Route::get('/editgroup{id}', function($id)
{
       
        return View::make('/editgroup')->with('id', $id);
});

Route::post('/editgroup{id}', function($id)
{
       $keyword=Input::get('keyword');
       
       $users=DB::table('users')->where('email','LIKE','%'.$keyword.'%')->get();
       var_dump('search results');
       
       foreach ($users as $user) {
           var_dump($user->email);
   
       }
        return Redirect::to(Route::input('editgroup{id}'))->with('id', $id);
});

Route::get('/groups', function()
{
       
    
	return View::make('/groups');
});

//Route::post('/groups', function()
//{
       // $room = new Room;
       // $room->name = $_POST['name'];
       // $room->save();
        
         // return Redirect::to('/')->with('flash_message', 'Group created!');
	
//});


    
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
# /app/routes.php
Route::get('/logout', 'UserController@getLogout');

Route::get('/{id}', function($id)
{

	return View::make('/room')->with('id', $id);
});

Route::post('/{id}', function($id) {

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
    return Redirect::to(Route::input('id'))->with('id', $id);
}); 

Route::get('/room', function()
{
    
	return View::make('/room');
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