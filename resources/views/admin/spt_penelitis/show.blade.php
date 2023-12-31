<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Data SPT Peneliti</h1>
        <p class="mb-4">Lihat detail data SPT Peneliti di bawah.</p>

        <!-- Detail Data -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="font-weight-bold">Kode Tender</th>
                            <td>{{ $sptPeneliti->dataTender->kd_tender }} - {{ $sptPeneliti->dataTender->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Nomor SPT</th>
                            <td>{{ $sptPeneliti->nomor_spt }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Tahun</th>
                            <td>{{ $sptPeneliti->tahun }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Kepala Balai</th>
                            <td>{{ $sptPeneliti->kepala_balai }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">NIP</th>
                            <td>{{ $sptPeneliti->nip }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Jabatan</th>
                            <td>{{ $sptPeneliti->jabatan }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Tanggal SPT</th>
                            <td>{{ $sptPeneliti->tanggal_spt }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Anggota Peneliti</th>
                            <td>{{ $sptPeneliti->anggota_peneliti }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Keterangan</th>
                            <td>{{ $sptPeneliti->keterangan }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Tombol Kembali -->
                <div class="mt-4">
                    <a href="{{ route('admin.spt_penelitis.index') }}" class="btn btn-secondary rounded">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('admin.spt_penelitis.export_pdf', $sptPeneliti->id) }}" class="btn btn-primary rounded">
                        <i class="fas fa-file-pdf"></i> Export to PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>