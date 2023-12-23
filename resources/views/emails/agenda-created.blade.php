<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Rapat Baru</title>
</head>
<body>
    <p>Halo,</p>
    <p>Anda telah diundang ke dalam sebuah rapat baru. Berikut adalah detail rapat:</p>

    <ul>
        <li>Email Peserta: {{ $agendaRapat->email_peserta }}</li>
        <li>Tanggal: {{ $agendaRapat->tanggal }}</li>
        <li>Waktu: {{ $agendaRapat->waktu }}</li>
        <li>Tempat: {{ $agendaRapat->tempat }}</li>
        <li>Deskripsi: {{ $agendaRapat->deskripsi }}</li>
    </ul>

    <p>Terima kasih.</p>
</body>
</html>
