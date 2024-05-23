@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Import Passengers</h2>
        <form action="{{ route('passengers.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="csv_file" class="block text-sm font-medium text-gray-700">CSV File</label>
                <input type="file" name="csv_file" id="csv_file" class="mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Import</button>
        </form>
    </div>
@endsection
