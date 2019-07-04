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
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home','PostController@home')->name('home');


//Route::get('/user/{id}',function($id) {
//    $user = User::find($id);
//    return $user->role;
//});

Route::resource('admin/user','AdminUserController')->middleware('Admin');
Route::resource('post','PostController')->middleware('Admin',['except' => ['home']]);
Route::resource('order','OrderController')->middleware('Admin');

//Route::get('orderPlace/{$post}','OrderController@orderPlace')->name('orderPlace');

Route::post('/orderPlace/{id}','OrderPlaceController@store')->name('orderPlace')->middleware('UserMiddleware');

//Route::post('/orderPlace',function (){
//    return "i am here";
//})->name('orderPlace');