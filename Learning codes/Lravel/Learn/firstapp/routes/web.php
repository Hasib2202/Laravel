<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::view('/home','home');

// Route::get('/about/{name}', function ($name) {
//     // echo "Hello, $name";
//     return view('about',[
//         'name' => $name
//     ]);
// });


// Route::redirect('/about', '/');
Route::get('/userName', [UserController::class, 'getUser']);
Route::get('/aboutUser', [UserController::class, 'aboutUser']);
Route::get('/about/{name}', [UserController::class, 'userName']);
Route::get('/user', [UserController::class, 'user']);
Route::get('/name/{name}', [UserController::class, 'nameView']);
// Route::get('/admin', [UserController::class, 'adminLogin']);
Route::get('/admin', [UserController::class, 'variable']);

//form route
Route::view('/user-form','user-form');
Route::post('/user-form', [UserController::class, 'userForm']);

Route::post('/user-form-extra', [UserController::class, 'userFormExtra']);

Route::view('url','url');
Route::view('test','url');


