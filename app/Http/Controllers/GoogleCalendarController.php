<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Support\Facades\Log;
use DateTime;
use App\Models\Event;
use Exception;

class GoogleCalendarController extends Controller
{
    public function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Calendar API Laravel');
        $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
        $client->setRedirectUri('http://localhost:8000/calendar/callback');
        $client->setAuthConfig([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI')
        ]);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Check if an access token is stored in the session
        if (session()->has('access_token')) {
            $accessToken = session()->get('access_token');

            // If the access token is expired, get a new one with the refresh token
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($accessToken['refresh_token']);
                session()->put('access_token', $client->getAccessToken());
            } else {
                $client->setAccessToken($accessToken);
            }
        }

        return $client;
    }

    public function redirectForAuthorization()
    {
        $client = $this->getClient();
        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    public function handleGoogleCallback()
    {
        $authCode = request('code');
        // Use the auth code to get access and refresh tokens
        $client = $this->getClient();
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the tokens in the session
        session()->put('access_token', $accessToken);

        // Fetch events and save them to the database
        $this->fetchEventsFromGoogleCalendar();

        // Redirect the user to a page of your choice
        return redirect('/calendar/events');
    }

    public function getEvents()
    {
        // Retrieve all events from the database
        $events = Event::all();

        // Return events as JSON
        return response()->json($events);
    }

    public function revokeTokens() {
        try {
            $client = $this->getClient();
            $client->revokeToken();
            // Clear the access token from your storage here
            session()->forget('access_token');

            return response()->json('Tokens revoked successfully');
        } catch (Exception $e) {
            // Handle exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    //handles the cron job every night at 11pm
    public function fetchEvents()
    {
                logger::info('No token found, can\'t fetch events');
        // Check if an access token is stored in the session
        if (!session()->has('access_token')) {
            // No token found, can't fetch events 
        //NOTE not redirecting to auth page because it can be run from cron job
            logger::info('No token found, can\'t fetch events');
            return response()->json(['error' => 'No token found, can\'t fetch events'], 500);
        }

        // Fetch events and save them to the database
        $savedEventsCount = $this->fetchEventsFromGoogleCalendar();

        // Get updated events from the database
        $updatedEvents = Event::all();

        return response()->json([
            'savedEventsCount' => $savedEventsCount,
            'events' => $updatedEvents
        ]);
    }

    private function fetchEventsFromGoogleCalendar()
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);
        $calendarId = 'primary';
        $results = $service->events->listEvents($calendarId);

        $savedEventsCount = 0;

        // Save events to database
        foreach ($results->getItems() as $item) {
            // Ignore events without date (for example, all-day events)
            if ($item->getStart()->dateTime != null && $item->getEnd()->dateTime != null) {
                Event::updateOrCreate(
                    ['event_id' => $item->getId()],
                    [
                        'title' => $item->getSummary(),
                        'description' => $item->getDescription(),
                        'start_date' => new DateTime($item->getStart()->dateTime),
                        'end_date' => new DateTime($item->getEnd()->dateTime),
                    ]
                );
                $savedEventsCount++;
            }
        }

        return $savedEventsCount;
    }
}
