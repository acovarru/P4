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

Route::get('/room', function()
{
    
	return View::make('/room');
});

Route::get('/editgroup', function()
{
    
	return View::make('/editgroup');
});

//Message routes 
Route::get('/message', 'MessageController@getMessage');
Route::post('/message', 'MessageController@postMessage');

//User routes 
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/logout', 'UserController@getLogout');

Route::get('/adduser/{user}/{id}', 'UserController@getAddUser');
Route::get('/deleteuser/{user}/{id}', 'UserController@getDeleteUser');

//Group routes
Route::get('/group/{id}', 'GroupController@getGroup');
Route::post('/group/{id}', 'GroupController@postGroup'); 
Route::get('/groups', 'GroupController@getGroups');
Route::get('/creategroup', 'GroupController@getCreateGroup');
Route::post('/creategroup', 'GroupController@postCreateGroup');
Route::get('/editgroup/{id}', 'GroupController@getEditGroup');
Route::post('/editgroup/{id}', 'GroupController@postEditGroup');
Route::get('/deletegroup/{id}', 'GroupController@getDeleteGroup');
