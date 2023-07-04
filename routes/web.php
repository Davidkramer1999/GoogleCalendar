<?php

use Illuminate\Support\Facades\Route;
//import GoogleCalendarController
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\GoogleCalendar;

//add routes

Route::get('/events', [GoogleCalendar::class, 'fetchEventsFromDb']);

Route::get('/refetch', [GoogleCalendar::class, 'refetchEvents']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
