<?php

namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchCalendarEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:calendar-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch events from Google Calendar and save to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
public function handle(\App\Http\Controllers\GoogleCalendarController $calendarController)
{
    // Fetch events
    $events = $calendarController->getEvents();

    // Save events
    $savedEventsCount = $this->saveEvents($events);

    // Log
    Log::info("FetchCalendarEvents command ran successfully. {$savedEventsCount} events were saved.");

    $this->info('FetchCalendarEvents command ran successfully.');
}

}
