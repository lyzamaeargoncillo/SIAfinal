<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;

class BookingController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        $passengers = Passenger::all();

        return view('bookings.index', compact('flights', 'passengers'));
    }

    public function create()
    {
        $flights = Flight::all();
        $passengers = Passenger::all();
    
        return view('bookings.create', compact('flights', 'passengers'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'flightId' => 'required|numeric',
            'passengerId' => 'required|numeric',
            'seat_no' => 'required|string|max:255',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.success');
    }

    public function success()
    {
        return view('bookings.success');
    }

    public function edit(Booking $booking)
    {
        $flights = Flight::all();
        $passengers = Passenger::all();

        return view('bookings.edit', compact('booking', 'flights', 'passengers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'flightId' => 'required|numeric',
            'passengerId' => 'required|numeric',
            'seat_no' => 'required|string|max:255',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
