<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop-surat {
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            /* Garis pembatas di bawah kop surat */
            padding-bottom: 10px;
            /* Ruang antara garis dan isi */
        }

        .kop-surat h2 {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 0;
            margin-bottom: 5px;
        }

        .kop-surat p {
            text-align: center;
            margin: 0;
        }

        .content {
            margin: 20px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: none;
            /* Hapus border */
            padding: 10px;
            text-align: left;
        }

        .ttd {
            margin-top: 50px;
        }

        .ttd p {
            text-align: center;
            margin: 0;
        }
    </style>

</head>

<body>

    <div class="header">
        <h1 style="font-size: 24px; font-weight: bold; text-transform: uppercase;">SURAT KEPUTUSAN</h1>
        <p>Detail Surat Keputusan</p>
    </div>

    <div class="kop-surat">
        <h2>SURAT KEPUTUSAN TENDER</h2>
        <p style="font-weight: bold;">Alamat: [Alamat Anda]</p>
        <p style="font-weight: bold;">Nomor Surat: {{ $dataSuratKeputusan->nomor_surat }}</p>
        <p style="font-weight: bold;">Nomor SK: {{ $dataSuratKeputusan->nomor_sk }}</p>
    </div>

    <div class="content">
        <table class="table">
            <tbody>
                <tr>
                    <th style="width: 30%;">Kode Tender</th>
                    <td>{{ $dataSuratKeputusan->kd_tender }}</td>
                </tr>
                <tr>
                    <th>Nomor SK</th>
                    <td>{{ $dataSuratKeputusan->nomor_sk }}</td>
                </tr>
                <tr>
                    <th>Nomor Surat</th>
                    <td>{{ $dataSuratKeputusan->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $dataSuratKeputusan->tahun }}</td>
                </tr>
                <tr>
                    <th>Tanggal Terbit</th>
                    <td>{{ $dataSuratKeputusan->tanggal_terbit }}</td>
                </tr>
                <tr>
                    <th>Pembuat Komitmen</th>
                    <td>{{ $dataSuratKeputusan->pembuat_komitmen }}</td>
                </tr>
                <tr>
                    <th>Nilai Kontrak</th>
                    <td>{{ $dataSuratKeputusan->dataTender->nilai_kontrak }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kontrak</th>
                    <td>{{ $dataSuratKeputusan->dataTender->tanggal_kontrak }}</td>
                </tr>
                <tr>
                    <th>Pagu</th>
                    <td>{{ $dataSuratKeputusan->dataTender->pagu }}</td>
                </tr>
                <tr>
                    <th>Nama Paket</th>
                    <td>{{ $dataSuratKeputusan->dataTender->nama_paket }}</td>
                </tr>
                <tr>
                    <th>Nama Instansi</th>
                    <td>{{ $dataSuratKeputusan->dataTender->nama_instansi }}</td>
                </tr>
                <tr>
                    <th>Satuan Kerja</th>
                    <td>{{ $dataSuratKeputusan->dataTender->satuan_kerja }}</td>
                </tr>

            </tbody>
        </table>
        <p style="font-weight: bold;">Isi Surat:</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="ttd">
        <p style="font-weight: bold;">Mengetahui,</p>
        <p>[Tempat untuk Tanda Tangan]</p>
    </div>

</body>

</html>