<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_no' => 'required|string',
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_no' => 'required|string',
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Flight deleted successfully.');
    }

    // public function index()
    // {
    //     $flights = Flight::all();
    //     return view('index', compact('flights'));
    // }

    public function pdf()
    {
        $flights = Flight::latest()->get();
        $pdf = Pdf::loadView('flights/pdf', ['flights' => $flights]);

        return $pdf->download('flights-list.pdf', $pdf);
    }

    public function generateCSV()
    {
        // Retrieve flights from the database
        $flights = Flight::all();

        // Generate CSV filename
        $fileName = 'flights_' . Str::slug(now(), '_') . '.csv';

        // Set CSV headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Create a CSV response
        return Response::stream(function () use ($flights) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['ID', 'Flight Number', 'Departure City', 'Arrival City', 'Departure Time', 'Arrival Time']);

            // Insert CSV data
            foreach ($flights as $flight) {
                fputcsv($file, [
                    $flight->id,
                    $flight->flight_no,
                    $flight->departure_city,
                    $flight->arrival_city,
                    $flight->departure_time,
                    $flight->arrival_time,
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }
}
