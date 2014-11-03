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
Route::get('/Base32Decoder', function()
{
	return View::make('index');
});

/*
 * POST route for Base 32 Decoder page
 * Retrieves the input generated on Base32Decoder GET Route
 * Generates base 32 decoded string based on input retrieved
 * Returns view of post
 */
Route::post('/Base32Decoder', function()
{

 
	return View::make('post');
});

