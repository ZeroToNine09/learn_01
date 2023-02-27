<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('books', 'BookController');
    Route::resource('histories', 'HistoryController');
});


//https://www.youtube.com/watch?v=KobysMt-GoE&list=PL8y3hWbcppt2nWBglaxrQm_A5sRjstdnK&index=4

// DEMO ROUTES
Route::get('hello-world', function () {
    return "Xin chào mọi người";
});

// Action là Controller và phương thức
//Route::get('users', 'UserController@showUsers');

// truyền tham số
Route::get('user/{id}', function($id) {
    echo "ID của user là : " . $id;
});

Route::get('greeting', function () {
    return view('form.hello_form');
})->name('greeting');

Route::post('greeting_post', function (Request $request) {
    return '<html><body><h1>Xin chào '. $request["name"] .'</h1></body></html>';
})->name('greeting_post');

