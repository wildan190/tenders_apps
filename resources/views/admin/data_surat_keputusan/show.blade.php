<!-- resources/views/admin/data_surat_keputusan/show.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Surat Keputusan</h1>
        <p class="mb-4">Informasi lengkap surat keputusan.</p>

        <!-- Informasi Surat Keputusan -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                            <tr>
                                <th>Action</th>
                                <td>
                                    <a href="{{ route('admin.data_surat_keputusans.edit', $dataSuratKeputusan->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Tombol Export to PDF -->
            <div class="card-footer">
                <a href="{{ route('admin.data_surat_keputusans.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <a href="{{ route('admin.data_surat_keputusans.export_pdf', $dataSuratKeputusan->id) }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Export to PDF
                </a>
            </div>
        </div>
    </div>
</x-app-layout>