<?php

namespace App\Services;

use App\Models\CsvData;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CsvImportService
{
    public function importCsvData($filePath)
    {
        // Validate if the file exists
        if (!file_exists($filePath)) {
            Log::error("CSV file not found: $filePath");
            return;
        }

        // Read the CSV file
        $csv = array_map('str_getcsv', file($filePath));

        // Remove the header row
        $header = array_shift($csv);

        // Define indexes for each column
        $firstNameIndex = array_search('firstname', $header);
        $lastNameIndex = array_search('lastname', $header);
        $emailIndex = array_search('email', $header);

        // Iterate through CSV data and create records
        foreach ($csv as $row) {
            // Check if all required columns exist
            if (!isset($row[$firstNameIndex], $row[$lastNameIndex], $row[$emailIndex])) {
                Log::warning("Incomplete row: " . implode(', ', $row));
                continue;
            }

            // Sanitize and trim each field
            $firstName = $this->sanitizeInput(trim($row[$firstNameIndex]));
            $lastName = $this->sanitizeInput(trim($row[$lastNameIndex]));
            $email = $this->sanitizeInput(trim($row[$emailIndex]));

            // Create a new record in the database
            CsvData::create([
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $email,
            ]);

            Log::info("Record created for: $firstName $lastName ($email)");
        }
    }

    private function sanitizeInput($value)
    {
        // Remove any non-ASCII characters from the input value
        return Str::ascii($value);
    }
}


