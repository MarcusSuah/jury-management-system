<!DOCTYPE html>
<html>

<head>
    <title>List</title>
    <style type="text/css">
        table {
            width: 100%;
            border-cobackground: #0a3a2d;
            llapse: collapse;
            border-spacing: 0;
            line-height: 20px;
        }

        th {
            border-bottom-width: 2px;
            line-height: 1.428571;
            text-align: center !important;
            font-size: 14px;
            font-family: system-ui;
            font-weight: 500;
            color: #ffffff;
            border-bottom-width: 2px;
            background: #053254 !important;
            /*background: #0a3a2d;*/
            border: 0.5px solid #eee;
            padding: 2px;
            line-height: 1.428571;
            font-size: 11px;
            font-family: system-ui;
            font-weight: 700;
        }

        td {
            border: 0.5px solid #eee;
            line-height: 1.428571;
            text-align: left;
            font-family: sans-serif;
            color: #525252;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div style="width:100%; height:auto;background:#fff;margin-bottom: 20px;text-align: center;">

        <h3 style="text-align:center;position:relative;margin-top:-5px;font-family:sans-serif;margin: 0;">AI-Powered Jury
            Selection Management
            System</h3>
    </div>
    <p style="text-align: center;text-decoration:underline;">Summon Report</p>
    <p>
        Total Summons: <b>{{ $summons_count }}</b>
    </p>
    <table>
        <thead>
            <tr>
                <th>SNO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Address</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['sno'] }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>{{ $row['category'] }}</td>
                    <td>{{ $row['address'] }}</td>
                    <td>{{ $row['message'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($row['date'])->format('l, d F, Y \\a\\t h:i A') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
