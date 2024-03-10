<?php

namespace App\Jobs;

use App\Models\CsvData;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ImportCsvData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function handle()
    {
        if (!file_exists($this->filePath)) {
            Log::error("CSV file not found: $this->filePath");
            return;
        }

        $handle = fopen($this->filePath, 'r');
        if ($handle !== false) {
            // Skip the header row
            fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== false) {
                // Sanitize and format data
                $firstName = $this->sanitizeAndFormat($data[0]);
                $lastName = $this->sanitizeAndFormat($data[1]);
                $email = trim($data[2]);

                // Check if the record already exists
                if (!CsvData::where('email', $email)->exists()) {
                    // Store data in the database
                    CsvData::create([
                        'firstname' => $firstName,
                        'lastname' => $lastName,
                        'email' => $email,
                    ]);
                }
            }
            fclose($handle);
        }
    }

    private function sanitizeAndFormat($value)
    {
        // Sanitize and format the value here
        return $value;
    }
}

