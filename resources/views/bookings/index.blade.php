@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Create Booking</h2>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf

            @if(isset($flights) && count($flights) > 0)
                <div class="mb-4">
                    <label for="flightId" class="block text-gray-600">Select Flight:</label>
                    <select name="flightId" id="flightId" class="form-select">
                        @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}">{{ $flight->flight_no }} - {{ $flight->departure_city }} to {{ $flight->arrival_city }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(isset($passengers) && count($passengers) > 0)
                <div class="mb-4">
                    <label for="passengerId" class="block text-gray-600">Select Passenger:</label>
                    <select name="passengerId" id="passengerId" class="form-select">
                        @foreach ($passengers as $passenger)
                            <option value="{{ $passenger->id }}">{{ $passenger->fname }} {{ $passenger->lname }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-4">
                <label for="seat_no" class="block text-gray-600">Seat Number:</label>
                <input type="text" name="seat_no" id="seat_no" class="form-input" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Booking</button>
        </form>
    </div>
@endsection
