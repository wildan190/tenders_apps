<!-- resources/views/admin/surat_penyampaians/pdf_template.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penyampaian</title>
    <!-- Add your additional styles if needed -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Define your custom styles here */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .letterhead {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            border-bottom: 2px solid #ccc;
        }

        .letterhead h2 {
            margin: 0;
            color: #007BFF;
        }

        .letterhead p {
            margin: 5px 0;
            color: #555;
        }

        .content {
            margin-bottom: 20px;
            padding: 20px;
            border-bottom: 2px solid #ccc;
        }

        .content h3 {
            color: #007BFF;
        }

        .info-block {
            margin-bottom: 20px;
        }

        .info-block table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-block th,
        .info-block td {
            border: none;
            padding: 10px;
            text-align: left;
        }

        .info-block h4 {
            margin: 10px 0 5px;
            color: #007BFF;
        }

        .info-block dt,
        .info-block dd {
            margin: 5px 0;
            color: #555;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }

        .signature img {
            max-width: 100px;
            height: auto;
        }

        .signature p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="letterhead">
                    <h2>Your Company Name</h2>
                    <p>123 Company Street, City, Country</p>
                    <p>Phone: (123) 456-7890 | Email: info@example.com</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h3>Surat Penyampaian</h3>
                    <div class="info-block">
                        <table class="table">
                            <tr>
                                <th>Kode Tender</th>
                                <td>{{ $kd_tender_value }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Surat Penyampaian</th>
                                <td>{{ $suratPenyampian->nomor_surat_penyampaian }}</td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>{{ $suratPenyampian->tahun }}</td>
                            </tr>
                            <!-- Add more fields as needed -->
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="info-block">
                        <h4>Tender Information</h4>
                        <table class="table">
                            <tr>
                                <th>Sifat</th>
                                <td>{{ $suratPenyampian->sifat }}</td>
                            </tr>
                            <tr>
                                <th>Destinasi Kepada</th>
                                <td>{{ $suratPenyampian->destinasi_kepada }}</td>
                            </tr>
                            <tr>
                                <th>Lampiran</th>
                                <td>{{ $suratPenyampian->lampiran }}</td>
                            </tr>
                            <tr>
                                <th>Perihal</th>
                                <td>{{ $suratPenyampian->perihal }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Balai</th>
                                <td>{{ $suratPenyampian->kepala_balai }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>{{ $suratPenyampian->nip }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>{{ $suratPenyampian->tanggal_surat }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Diterima</th>
                                <td>{{ $suratPenyampian->tanggal_diterima }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Kontrak</th>
                                <td>{{ $suratPenyampian->dataTender->nilai_kontrak }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kontrak</th>
                                <td>{{ $suratPenyampian->dataTender->tanggal_kontrak }}</td>
                            </tr>
                            <tr>
                                <th>Nama Paket</th>
                                <td>{{ $suratPenyampian->dataTender->nama_paket }}</td>
                            </tr>
                            <tr>
                                <th>Pagu</th>
                                <td>{{ $suratPenyampian->dataTender->pagu }}</td>
                            </tr>
                            <tr>
                                <th>Satuan Kerja</th>
                                <td>{{ $suratPenyampian->dataTender->satuan_kerja }}</td>
                            </tr>
                            <!-- Add more fields as needed -->
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content signature">
                    <p>Tertanda,</p>
                    <img src="{{ public_path('images/signature_placeholder.png') }}" alt="Signature">
                    <p>(Nama Pemberi Tanda Tangan)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js are required for Bootstrap functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>