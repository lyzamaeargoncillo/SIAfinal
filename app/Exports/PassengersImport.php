<?php

namespace App\Imports;

use App\Models\Passenger;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PassengersImport implements ToModel, WithHeadingRow
{
    /**
     * Create a new model instance.
     *
     * @param array $row
     * @return Passenger|null
     */
    public function model(array $row)
    {
        // Validate and process each row of the CSV file
        if (!$this->isValidRow($row)) {
            return null; // Skip invalid rows
        }

        return new Passenger([
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            // Add more fields as needed
        ]);
    }

    /**
     * Validate a row of data.
     *
     * @param array $row
     * @return bool
     */
    private function isValidRow(array $row)
    {
        // Add your validation rules here
        // For example:
        // Check if all required fields are present
        // Check if email is valid
        // Add more validation rules as needed
        return !empty($row['fname']) && !empty($row['lname']) && !empty($row['email']) && !empty($row['phone']);
    }
}
