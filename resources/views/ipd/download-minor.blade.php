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
                thead {display: table-header-group;}

        }

    </style>
</head>
<body>
<h3 style="text-align: center"> Minor Register From: {{ Carbon\Carbon::parse($start)->format('d-m-Y')}} To: {{ Carbon\Carbon::parse($end)->format('d-m-Y') }}</h3>
<table cellpadding="10">
    <thead>
    <tr>
        <td>No</td>
        <td>OPD No</td>
        <td>IPD No</td>
        <td>Full Name</td>
        <td>Guardian Name</td>
        <td>Age/Gender</td>
        <td>Address</td>
        <td>Procedure Date</td>
        <td>Procedures</td>
    </tr>
    </thead>
    <tbody>
    @foreach($ipdpatients as $ipdpatient)
        <tr>
            <td>{{ $i++ }}</td>
            <td style="text-transform: uppercase;">{{ $ipdpatient -> opdpatient -> patient_id   }}</td>
            <td style="text-transform: uppercase;">{{ $ipdpatient -> ipd_no }}</td>
            <td style="text-transform: capitalize;">{{ $ipdpatient -> opdpatient -> first_name }} {{ $ipdpatient -> opdpatient -> last_name }}</td>
            <td style="text-transform: capitalize;">{{ $ipdpatient -> attendent_name }}</td>
            <td >{{ Carbon\Carbon::parse($ipdpatient -> opdpatient -> birth_date)->diff(Carbon\Carbon::now())->format('%y') }}/{{ $ipdpatient -> opdpatient -> gender }}</td>
            <td style="text-transform: capitalize;">{{ $ipdpatient -> opdpatient -> address}}, {{ $ipdpatient -> opdpatient -> country }}</td>
            <td style="text-transform: capitalize;">{{ Carbon\Carbon::parse($ipdpatient -> procedure_date)->format('d-m-Y')}}</td>
            <td style="text-transform: capitalize;">
                @foreach($ipdpatient -> ipdprocedures as $ipdprocedure)
                    <li>{{ $ipdprocedure -> ipdprocedure_name }}</li>
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>