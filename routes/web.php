<?php

use Illuminate\Support\Facades\Route;
//import GoogleCalendarController
use App\Http\Controllers\GoogleCalendarController;

//add routes
Route::get('/calendar', [GoogleCalendarController::class, 'redirectForAuthorization']);
Route::get('/calendar/callback', [GoogleCalendarController::class, 'handleGoogleCallback']);
Route::get('/calendar/events', [GoogleCalendarController::class, 'getEvents']);
Route::get('/calendar/revoke', [GoogleCalendarController::class, 'revokeTokens']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
