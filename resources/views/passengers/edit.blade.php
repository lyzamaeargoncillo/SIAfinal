@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Edit Passenger</h2>
        <a href="{{ route('passengers.index') }}" class="bg-grey-500 text-black px-4 py-2 rounded hover:underline">Back</a>
        <br> <br>  
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('passengers.update', ['passenger' => $passenger->id]) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-4">
                <label for="fname" class="block text-gray-600">First Name:</label>
                <input type="text" name="fname" id="fname" value="{{ old('fname', $passenger->fname) }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="lname" class="block text-gray-600">Last Name:</label>
                <input type="text" name="lname" id="lname" value="{{ old('lname', $passenger->lname) }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $passenger->email) }}" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-600">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $passenger->phone) }}" class="form-input mt-1 block w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
