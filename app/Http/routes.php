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

Route::get('/', ['middleware' => 'login', function()
{
	return View::make('home');
}]);

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});

// Route::get('/questions/create', ['middleware' => 'login', function()
// {
// 	return View::make('questions/create');
// }]);


Route::get('questions/create', ['middleware' => 'login', 'uses' => 'QuestionController@create']);
Route::get('questions/show', ['middleware' => 'login', 'uses' => 'QuestionController@show']);
Route::get('questions/{id}/edit', ['middleware' => 'login', 'uses' => 'QuestionController@edit']);
Route::any('question/getQAList', 'QuestionController@getQAList');
Route::any('question/uploadResult', 'QuestionController@uploadResult');
Route::patch('questions/{id}', 'QuestionController@update');
Route::post('questions', 'QuestionController@store');

Route::get('questions/showResult', ['middleware' => 'login', 'uses' => 'QuestionController@showResult']);

Route::post('mobileRegister', 'MobileController@postRegister');
Route::post('mobileLogin', 'MobileController@postLogin');
Route::any('stage/getCategoryList', 'CategoryController@getCategoryList');
Route::any('stage/getStageList', 'StageController@getStageList');

Route::any('rank', 'RankController@getRank');

Route::any('favorite/getFavoriteList', 'FavoriteController@getFavoriteList');
Route::any('favorite/uploadFavoriteList', 'FavoriteController@uploadFavoriteList');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);