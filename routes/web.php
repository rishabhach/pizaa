<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home',function(){
    return view('home1');
});


Route::get('/user/{id}',function($id) {
    $user = User::find($id);
    return $user->role;
});

Route::resource('admin/user','AdminUserController');
Route::resource('post','PostController');
