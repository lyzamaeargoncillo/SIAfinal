<?php

namespace App\Exports;

use App\Models\Passenger;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassengersExport implements FromCollection
{
    public function collection()
    {
        return Passenger::all();
    }
}
