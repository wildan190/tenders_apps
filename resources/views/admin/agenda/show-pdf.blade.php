<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Rapat - {{ $agendaRapat->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table th,
        .info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .description {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>Agenda Rapat - {{ $agendaRapat->id }}</h1>
    </div>

    <!-- Informasi Agenda dalam Tabel -->
    <table class="info-table">
        <tr>
            <th>Tanggal</th>
            <td>{{ $agendaRapat->tanggal }}</td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>{{ $agendaRapat->title }}</td>
        </tr>
        <tr>
            <th>Waktu</th>
            <td>{{ $agendaRapat->waktu }}</td>
        </tr>
        <tr>
            <th>Tempat</th>
            <td>{{ $agendaRapat->tempat }}</td>
        </tr>
    </table>

    <!-- Deskripsi Agenda -->
    <div class="description">
        <h2>Deskripsi</h2>
        <p>{{ $agendaRapat->deskripsi }}</p>
    </div>

</body>
</html>
