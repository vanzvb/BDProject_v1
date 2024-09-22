<?php

use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\PreviewFormController;
use App\Http\Controllers\QuestionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


Route::get('/testing-area-home', function () {
    return view('dumpArea.homeDump');
});

Route::get('/testing-area-welcome', function () {
    return view('dumpArea.welcomeDump');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('questions', QuestionController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('events', App\Http\Controllers\EventController::class);
});



// Change EventDetail Status (for users)
Route::get('event-details/change-status/{id}', [EventDetailController::class, 'changeStatus'])->name('event-details.changeStatus');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/preview-form', [PreviewFormController::class, 'showPreviewForm'])->name('preview.form');





Route::get('forms', [App\Http\Controllers\Auth\CustomRedirectController::class, 'redirectToBlade'])->name('auth.form');

Route::post('forms', [App\Http\Controllers\Auth\CustomRedirectController::class, 'handleFormSubmit'])->name('form.submit');





