<!-- fetch-data.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Google Sheets Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Google Sheets Data</h1>
<button onclick="location.href='{{ route('fetch-data') }}'">Import Data</button>
<table>
    <thead>
    <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <!-- Add more columns as needed -->
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            @foreach($row as $cell)
                <td>{{ $cell }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
