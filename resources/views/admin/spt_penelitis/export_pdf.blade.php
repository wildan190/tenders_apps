<!-- resources/views/admin/spt_penelitis/export_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export SPT Peneliti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .info-table th, .info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .signature {
            margin-top: 40px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Kantor XYZ</h2>
        <p>Jalan ABC No. 123, Kota Anda</p>
        <p>Kontak: (012) 345-6789</p>
        <hr>
        <h1>Surat Perintah Tugas (SPT) Peneliti</h1>
    </div>

    <table class="info-table">
        <tr>
            <th>Kode Tender</th>
            <td>{{ $sptPeneliti->dataTender->kd_tender }} - {{ $sptPeneliti->dataTender->nama_paket }}</td>
        </tr>
        <tr>
            <th>Nomor SPT</th>
            <td>{{ $sptPeneliti->nomor_spt }}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>{{ $sptPeneliti->tahun }}</td>
        </tr>
        <tr>
            <th>Kepala Balai</th>
            <td>{{ $sptPeneliti->kepala_balai }}</td>
        </tr>
        <tr>
            <th>NIP</th>
            <td>{{ $sptPeneliti->nip }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $sptPeneliti->jabatan }}</td>
        </tr>
        <tr>
            <th>Tanggal SPT</th>
            <td>{{ $sptPeneliti->tanggal_spt }}</td>
        </tr>
        <tr>
            <th>Anggota Peneliti</th>
            <td>{{ $sptPeneliti->anggota_peneliti }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $sptPeneliti->keterangan }}</td>
        </tr>
        <!-- Add more rows for additional information -->
    </table>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>

    <div class="signature">
        <p>.........................</p>
        <p>Nama Penandatangan</p>
        <p>Jabatan</p>
    </div>

    <div class="footer">
        <p>Terima Kasih</p>
    </div>

</body>
</html>
