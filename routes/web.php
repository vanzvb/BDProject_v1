<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testing-area-home', function () {
    return view('dumpArea.homeDump');
});

Route::get('/testing-area-welcome', function () {
    return view('dumpArea.welcomeDump');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('events', App\Http\Controllers\EventController::class);
    
});
Route::get('forms', [App\Http\Controllers\Auth\CustomRedirectController::class, 'redirectToBlade'])->name('auth.form');

