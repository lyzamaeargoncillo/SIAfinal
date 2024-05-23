<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert to pdf</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>User Lists</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Qr Code</th>
                <th>flight_no</th>
                <th>departure_city</th>
                <th>arrival_city</th>
                <th>departure_time</th>
                <th>arrival_time</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($flights as $flight)
                @if($count++ > 10)
                <div style="page-break-after: always"> &nbsp; </div>
                @php $count = 0; @endphp
                @endif
            <tr>
                <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(80)->generate($flight->id)) }}" alt="QR Code"></td>
                <td>{{$flight->flight_no}}</td>
                <td>{{$flight->departure_city}}</td>
                <td>{{$flight->arrival_city}}</td>
                <td>{{$flight->departure_time}}</td>
                <td>{{$flight->arrival_time}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>