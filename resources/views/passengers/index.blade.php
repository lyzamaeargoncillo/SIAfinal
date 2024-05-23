@extends('home')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Passengers</h2>
        <a href="{{ route('passengers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Passenger</a>
        <a href="{{ route('passengers.export') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Export CSV</a>
        <a href="{{ route('passengers.importForm') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 ml-2">Import CSV</a>
        <br><br>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">First Name</th>
                    <th class="p-2 border border-gray-300">Last Name</th>
                    <th class="p-2 border border-gray-300">Email</th>
                    <th class="p-2 border border-gray-300">Phone</th>
                    <th class="p-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($passengers as $passenger)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="p-2 border border-gray-300">{{ $passenger->id }}</td>
                        <td class="p-2 border border-gray-300">{{ $passenger->fname }}</td>
                        <td class="p-2 border border-gray-300">{{ $passenger->lname }}</td>
                        <td class="p-2 border border-gray-300">{{ $passenger->email }}</td>
                        <td class="p-2 border border-gray-300">{{ $passenger->phone }}</td>
                        <td class="p-2 border border-gray-300">
                            <a href="{{ route('passengers.edit', ['passenger' => $passenger->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('passengers.destroy', ['passenger' => $passenger->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
