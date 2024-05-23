<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all();
        return view('passengers.index', compact('passengers'));
    }

    public function create()
    {
        return view('passengers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:passengers,email',
            'phone' => 'required|string|max:20',
        ]);

        Passenger::create($request->all());

        return redirect()->route('passengers.index')->with('success', 'Passenger created successfully.');
    }

    public function update(Request $request, Passenger $passenger)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:passengers,email,' . $passenger->id,
            'phone' => 'required|string|max:20',
        ]);

        $passenger->update($request->all());

        return redirect()->route('passengers.index')->with('success', 'Passenger updated successfully.');
    }

    public function edit(Passenger $passenger)
    {
        return view('passengers.edit', compact('passenger'));
    }

    public function destroy(Passenger $passenger)
    {
        $passenger->delete();

        return redirect()->route('passengers.index')->with('success', 'Passenger deleted successfully.');
    }

    public function generateCSV()
    {
        $passengers = Passenger::all();
        $fileName = 'passengers_' . Str::slug(now(), '_') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        return new StreamedResponse(function() use ($passengers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'First Name', 'Last Name', 'Email', 'Phone']);

            foreach ($passengers as $passenger) {
                fputcsv($file, [
                    $passenger->id,
                    $passenger->fname,
                    $passenger->lname,
                    $passenger->email,
                    $passenger->phone,
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }

    public function showImportForm()
    {
        return view('passengers.import');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $fileHandle = fopen($file, 'r');
        $header = fgetcsv($fileHandle, 1000, ',');

        while ($row = fgetcsv($fileHandle, 1000, ',')) {
            $passengerData = [
                'id' => is_numeric($row[0]) ? intval($row[0]) : null,
                'fname' => $row[1],
                'lname' => $row[2],
                'email' => $row[3],
                'phone' => $row[4],
            ];

            if (is_null($passengerData['id'])) {
                unset($passengerData['id']);
            }

            Passenger::updateOrCreate(['id' => $passengerData['id']], $passengerData);
        }

        fclose($fileHandle);

        return redirect()->route('passengers.index')->with('success', 'Passengers have been imported successfully.');
    }
}
