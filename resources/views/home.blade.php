<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOKS ARILINES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body class="font-sans bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <h1 class="text-white text-2xl font-semibold">Loks Airlines</h1>
        <ul class="flex justify-end items-center space-x-4">
            <li class="nav-item">
                <a class="text-white hover:underline hover:text-yellow-300 active:text-yellow-500 {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="text-white hover:underline hover:text-yellow-300 active:text-yellow-500 {{ Request::is('flights') ? 'active' : '' }}"
                    href="{{ url('/flights') }}">FLIGHTS</a>
            </li>
            <li class="nav-item">
                <a class="text-white hover:underline hover:text-yellow-300 active:text-yellow-500 {{ Request::is('passengers') ? 'active' : '' }}"
                    href="{{ url('/passengers') }}">PASSENGERS</a>
            </li>
            <li class="nav-item">
                <a class="text-white hover:underline hover:text-yellow-300 active:text-yellow-500 {{ Request::is('bookings') ? 'active' : '' }}"
                    href="{{ url('/bookings') }}">BOOKINGS</a>
            </li>
        </ul>
    </nav>

    <div class="container mx-auto my-5">
        @yield('content')
    </div>
</body>

</html>
