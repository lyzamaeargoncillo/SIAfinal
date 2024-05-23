@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Create Booking</h2>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf

            <label for="flightId">Select Flight:</label>
            <select name="flightId" id="flightId">
                @foreach ($flights as $flight)
                    <option value="{{ $flight->id }}">{{ $flight->flight_no }} - {{ $flight->departure_city }} to {{ $flight->arrival_city }}</option>
                @endforeach
            </select>

            <div class="mb-4">
                <label for="passengerId" class="block text-gray-600">Passenger ID:</label>
                <input type="text" name="passengerId" id="passengerId" class="form-input mt-1 block w-full" />
            </div>

            <div class="mb-4">
                <label for="seat_no" class="block text-gray-600">Seat Number:</label>
                <input type="text" name="seat_no" id="seat_no" class="form-input mt-1 block w-full" />
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Booking</button>
        </form>
    </div>
@endsection
