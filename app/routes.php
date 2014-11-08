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

use Base32\Base32;

/*
 * GET Route declared using the Route facade for Base 32 Decoder page
 * Returns view of Base32Decoder
 */
//Route::get('/Base32Decoder', function()
//{
//	return View::make('index');
//});

/*
 * POST route for Base 32 Decoder page
 * Retrieves the input generated on Base32Decoder GET Route
 * Generates base 32 decoded string based on input retrieved
 * Returns view of post
 */
Route::get('/test', function()
{

 //$tests = Test::all();
	 # Instantiate a new Test model class
    $test = new Test();

    # Set 
    $test->conversation = 'First message from laravel app';
    $test->message = 'This is the 4th message';
   

    # This is where the Eloquent ORM magic happens
    $test->save();

    return 'A new book has been added! Check your database to see...';
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