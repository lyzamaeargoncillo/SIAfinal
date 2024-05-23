@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Flights</h2>

        <div class="flex justify-between mb-4">
            <div>
                <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm flex items-center gap-2">
                    <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88" style="width: 20px; height: 20px;">
                        <title>scan</title>
                        <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
                    </svg>
                </a>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('flights.create') }}" style="background-color: #277aef; color: #fff; border-color: #277aef;" class="btn mb-2 p-2">Create Flight</a>
                <a href="{{ route('flights.csv') }}" style="background-color: #277aef; color: #fff; border-color: #277aef;" class="btn mb-2 p-2">Generate CSV</a>
                <a href="flight/pdf" target="_blank" style="background-color: #277aef; color: #fff; border-color: #277aef;" class="btn mb-2 p-2">Export</a>
            </div>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success mb-4">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Uncomment and adjust the table section as needed --}}
        {{-- 
        <table class="w-full border-collapse border border-gray-300 mb-8">
            <thead>
                <tr>
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">Flight Number</th>
                    <th class="p-2 border border-gray-300">Departure City</th>
                    <th class="p-2 border border-gray-300">Arrival City</th>
                    <th class="p-2 border border-gray-300">Departure Time</th>
                    <th class="p-2 border border-gray-300">Arrival Time</th>
                    <th class="p-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td class="p-2 border border-gray-300">{{ $flight->id }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->flight_no }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->departure_city }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->arrival_city }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->departure_time }}</td>
                        <td class="p-2 border border-gray-300">{{ $flight->arrival_time }}</td>
                        <td class="p-2 border border-gray-300 flex space-x-2">
                            <a href="{{ route('flights.edit', ['flight' => $flight->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('flights.destroy', ['flight' => $flight->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($flights as $flight)
                <div class="card border border-gray-300 rounded shadow-sm p-4">
                    <div class="card-body flex items-center">
                        <div class="flex-shrink-0">
                            {!! QrCode::size(100)->generate($flight->flight_no . ' - ' . $flight->departure_city) !!}
                        </div>
                        <div class="ml-4">
                            <h3 class="card-title font-semibold text-lg">{{ $flight->flight_no }}</h3>
                            <p class="text-gray-600">{{ $flight->departure_city }} to {{ $flight->arrival_city }}</p>
                            <p class="text-gray-600">{{ $flight->departure_time }} - {{ $flight->arrival_time }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @section('scripts')
    <script src="path/to/qrcode.min.js"></script>
    <script>
        // Function to handle QR code scanning
        function handleQRScan(content) {
            // Split the content into flight number and departure city
            var parts = content.split(' - ');
            var flightNo = parts[0];
            var departureCity = parts[1];
            alert("Flight Number: " + flightNo + "\nDeparture City: " + departureCity); // Display the flight number and departure city
            // You can perform any further action with the flight number and departure city here
        }
    </script>
    @endsection
@endsection
