<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Google_Client;
use Google_Service_Calendar;
use DateTime;

use Spatie\GoogleCalendar\Event as GoogleEvent;

class GoogleCalendar extends Controller
{
    public function refetchEvents()
    {
        $events = GoogleEvent::get();

        foreach ($events as $event) {
            $this->updateOrCreateEvent($event);
        }
        $savedEvents = Event::all();

        return response()->json($savedEvents);
    }

    public function fetchAndStoreEvents()
    {
        try {
            // Fetch events from Google Calendar
            $events = GoogleEvent::get();

            // Save each event to the database
            foreach ($events as $event) {
                $this->updateOrCreateEvent($event);
            }
            Log::info('Fetch and store events ran successfully');
        } catch (\Exception $e) {
            Log::error('Failed to fetch and store events: ');
        }
    }

    public function updateOrCreateEvent($event)
    {
        Event::updateOrCreate(
            ['event_id' => $event->googleEvent->id],
            [
                'title' => $event->googleEvent->summary,
                'description' => $event->googleEvent->description,
                'start_date' => Carbon::parse($event->googleEvent->start->dateTime),
                'end_date' => Carbon::parse($event->googleEvent->end->dateTime),
            ]
        );
    }
}
