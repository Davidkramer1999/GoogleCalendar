<?php

use Illuminate\Support\Facades\Route;
//import GoogleCalendarController
use App\Http\Controllers\GoogleCalendarController;

//add routes


//initial call to google calendar permissions to allow access
Route::get('/auth', [GoogleCalendarController::class, 'redirectForAuthorization']);
//callback route to handle google calendar response so saving tokens and events to db
Route::get('/calendar/callback', [GoogleCalendarController::class, 'handleGoogleCallback']);
//route to fetch events from google calendar
Route::get('/calendar/events', [GoogleCalendarController::class, 'getEvents']);
//refetch events from google calendar
Route::get('/refetch', [GoogleCalendarController::class, 'refetchEvents']);
//clear tokens from session
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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
