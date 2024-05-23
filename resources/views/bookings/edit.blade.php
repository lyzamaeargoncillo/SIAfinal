@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Edit Booking</h2>

        <form action="{{ route('bookings.update', ['booking' => $booking->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="flightId" class="block text-gray-600">Flight ID:</label>
                <input type="text" name="flightId" id="flightId" class="form-input mt-1 block w-full" value="{{ $booking->flightId }}" />
            </div>

            <div class="mb-4">
                <label for="passengerId" class="block text-gray-600">Passenger ID:</label>
                <input type="text" name="passengerId" id="passengerId" class="form-input mt-1 block w-full" value="{{ $booking->passengerId }}" />
            </div>

            <div class="mb-4">
                <label for="seat_no" class="block text-gray-600">Seat Number:</label>
                <input type="text" name="seat_no" id="seat_no" class="form-input mt-1 block w-full" value="{{ $booking->seat_no }}" />
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Booking</button>
        </form>
    </div>
@endsection
