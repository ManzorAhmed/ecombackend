<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\HomeController;

class UpdateGoogleSheetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-google-sheet-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and updates data from the Google Sheets document.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch data from Google Sheets using HomeController method
        $homeController = new HomeController();
        $data = $homeController->fetchData();

        // Store the fetched data in cache
        cache()->forever('google_sheet_data', $data);

        // Output a success message
        $this->info('Google Sheets data has been updated successfully.');
    }
}
