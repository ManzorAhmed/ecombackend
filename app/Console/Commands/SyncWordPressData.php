<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class SyncWordPressData extends Command
{
    protected $signature = 'sync:wordpress-data';
    protected $description = 'Sync data from WordPress table to Google Sheet';

    public function handle()
    {
        // WordPress database setup
        config(['database.connections.wordpress' => [
            'driver' => 'mysql',
            'host' => '199.188.200.149',
            'database' => '2000125_newdb',
            'username' => '2000125_newsite',
            'password' => 'spiDeR#3804',
            // ... other database connection details
        ]]);

        // Set the WordPress database connection
        \Config::set('database.default', 'wordpress');

        // Google Sheets API setup
        $client = new Google_Client();
        $client->setApplicationName('VF ADNOC CLASS'); // Set your application name
        $client->setDeveloperKey(env('AIzaSyAzCPfDPp4tTIv0qKgobTxlCpBchJpMt4Q'));
        $service = new Google_Service_Sheets($client);


        // Get data from the WordPress table
        $data = \DB::table('wbk_appointments')->get()->toArray();

        // Prepare data for Google Sheets
        $values = [];
        foreach ($data as $row) {
            $values[] = [
                'Customer Name' => $row->name . ' ' . $row->additional_name_field,
                'Customer Email' => $row->email,
                'Customer ADNOC ID NO.' => $row->custom_field1,
                'Beyond Program Card Registered Email' => $row->custom_field9,
                'Customer Health ID No.' => $row->custom_field3,
                'Customer Mazaya ID NO.' => $row->custom_field4,
                'Booking Location' => $row->wbk_category_id, // Adjust as needed based on your WordPress table structure
                'Booking Class' => $row->wbk_service_id, // Adjust as needed based on your WordPress table structure
                'Booking Date' => $row->wbk_date, // Adjust as needed based on your WordPress table structure
                'Booking Time' => $row->wbk_time_selected,
                'Customer Phone' => $row->wbk_phone,
            ];
        }

        // Update Google Sheet
        $range = 'Sheet1!A1';  // Adjust the sheet and range
        $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
        $params = ['valueInputOption' => 'RAW'];
        $service->spreadsheets_values->update(env('1xLgxPTob53d5WnVmi8cThxfT2oSOdPuLEQePAzNs0J4'), $range, $body, $params);
    }
}
