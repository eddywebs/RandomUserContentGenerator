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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/sandbox', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    # Here we explicitly include the namespace in our call to the `Pre` class and the `render()` method.
    echo Pre::render($fruit,'Fruit');
    //echo "hello world";

});