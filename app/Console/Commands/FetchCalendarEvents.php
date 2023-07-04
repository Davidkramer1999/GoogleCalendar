<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\GoogleCalendar;

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
    public function handle()
    {
        // Fetch events
        $controller = app()->make(GoogleCalendar::class);
        $controller->fetchAndStoreEvents();
    }
}
