@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Create Passenger</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('passengers.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="fname" class="block text-gray-600">First Name:</label>
                <input type="text" name="fname" id="fname" value="{{ old('fname') }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="lname" class="block text-gray-600">Last Name:</label>
                <input type="text" name="lname" id="lname" value="{{ old('lname') }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-600">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input mt-1 block w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
        </form>
    </div>
    <br>    
@endsection
