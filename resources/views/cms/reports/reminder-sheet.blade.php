<html>
<head>
    <title>OMS-CMS Reports</title>

    <style>
        @media print {
            body
            {
                font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
                font-size: 1em;
                color: #333333;
                margin-top: 2cm;
                margin-right: 2cm;
                margin-bottom: 1.5cm;
                margin-left: 2cm
            }

            table
            {
                width: 100%;
                border: 1px solid black;
            }

        }

    </style>
</head>
<body>
<h3 style="text-align: center">Today's Reminder Call Log</h3>
<table cellpadding="10">
    <thead>
    <tr>
        <td>Name</td>
        <td>Gender</td>
        <td>City</td>
        <td>Country</td>
        <td>Email</td>
        <td>Mobile</td>
        <td>Mode</td>
        <td>Procedure</td>
        <td>Detail</td>
        <td>Remarks</td>
    </tr>
    </thead>
    <tbody>
    @foreach($callers as $caller)
        <tr>
            <td>{{ $caller -> first_name  }} &nbsp; {{ $caller -> last_name }}</td>
            <td>{{ $caller -> gender }}</td>
            <td>{{ $caller -> city }}</td>
            <td>{{ $caller -> country }}</td>
            <td>{{ $caller -> email }}</td>
            <td>{{ $caller -> mobile }}</td>
            <td>{{ $caller -> mode }}</td>
            <td>{{ $caller -> procedure }}</td>
            <td>{{ $caller -> detail }}</td>
            <td>{{ $caller -> remarks }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>