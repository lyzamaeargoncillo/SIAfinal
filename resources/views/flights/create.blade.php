@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Create Flight</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('flights.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="flight_no" class="block text-gray-600">Flight Number:</label>
                <input type="text" name="flight_no" id="flight_no" class="form-input">
            </div>

            <div class="mb-4">
                <label for="departure_city" class="block text-gray-600">Departure City:</label>
                <input type="text" name="departure_city" id="departure_city" class="form-input">
            </div>

            <div class="mb-4">
                <label for="arrival_city" class="block text-gray-600">Arrival City:</label>
                <input type="text" name="arrival_city" id="arrival_city" class="form-input">
            </div>

            <div class="mb-4">
                <label for="departure_time" class="block text-gray-600">Departure Time:</label>
                <input type="datetime-local" name="departure_time" id="departure_time" class="form-input">
            </div>

            <div class="mb-4">
                <label for="arrival_time" class="block text-gray-600">Arrival Time:</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-input">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Flight</button>
            </div>
        </form>
    </div>
@endsection
