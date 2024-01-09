<!-- resources/views/admin/cek_data_tenders/show.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Cek Data Tender</h1>

        <!-- Detail Cek Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Data Tender</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Kode Tender</th>
                            <td><a href="{{ $cekDataTender->dataTender->link_web }}" target="_blank">{{ $cekDataTender->dataTender->kd_tender }}</a></td>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <td>{{ $cekDataTender->dataTender->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pokja</th>
                            <td>{{ $cekDataTender->dataTender->kode_pokja }}</td>
                        </tr>
                        <tr>
                            <th>Pagu</th>
                            <td>{{ $cekDataTender->dataTender->pagu }}</td>
                        </tr>
                        <tr>
                            <th>Kode Tender</th>
                            <td>{{ $cekDataTender->dataTender->kd_tender }}</td>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <td>{{ $cekDataTender->dataTender->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pokja</th>
                            <td>{{ $cekDataTender->dataTender->kodePokja->kode_pokja }} - {{ $cekDataTender->dataTender->kodePokja->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Pagu</th>
                            <td>{{ $cekDataTender->dataTender->pagu }}</td>
                        </tr>
                        <tr>
                            <th>Satuan Kerja</th>
                            <td>{{ $cekDataTender->dataTender->satuan_kerja }}</td>
                        </tr>
                        <tr>
                            <th>PPK</th>
                            <td>{{ $cekDataTender->dataTender->ppk }}</td>
                        </tr>
                        <tr>
                            <th>Nama Instansi</th>
                            <td>{{ $cekDataTender->dataTender->nama_instansi }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Penawaran</th>
                            <td>{{ $cekDataTender->dataTender->nilai_penawaran }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penetapan</th>
                            <td>{{ $cekDataTender->dataTender->tanggal_penetapan }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Kontrak</th>
                            <td>{{ $cekDataTender->dataTender->nilai_kontrak }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kontrak</th>
                            <td>{{ $cekDataTender->dataTender->tanggal_kontrak }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pelaksanaan</th>
                            <td>{{ $cekDataTender->dataTender->waktu_pelaksanaan }}</td>
                        </tr>
                        <!-- Tambahkan informasi lain sesuai kebutuhan -->
                    </tbody>
                </table>

                <h5 class="card-title mt-4">Informasi Personil</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->nama_personil }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->jabatan_personil }}</td>
                        </tr>
                        <tr>
                            <th>NIK Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->nik_personil }}</td>
                        </tr>
                        <tr>
                            <th>NPWP Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->npwp_personil }}</td>
                        </tr>
                        <tr>
                            <th>Email Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->email_personil }}</td>
                        </tr>
                        <tr>
                            <th>Telepon Personil</th>
                            <td>{{ $cekDataTender->cekPersonil->telepon_personil }}</td>
                        </tr>
                        <tr>
                            <th>Pokja</th>
                            <td>{{ $cekDataTender->dataTender->pokjas->implode('nama', ', ') }}</td>
                        </tr>
                        <!-- Tambahkan informasi lain sesuai kebutuhan -->
                    </tbody>
                </table>
                <h5 class="card-title mt-4">Status</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>{{ $cekDataTender->status }}</td>
                        </tr>
                    </tbody>
                </table>
                <!-- Tombol Kembali -->
                <div class="mt-4">
                    <a href="{{ route('admin.cek_data_tenders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>