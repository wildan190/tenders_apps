<!-- resources/views/admin/cek_peralatans/show.blade.php -->

<x-app-layout>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Cek Peralatan</h1>

        <!-- Show Cek Peralatan Info -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Informasi Cek Peralatan -->
                <h5 class="card-title">Informasi Cek Peralatan</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Kode Pokja</th>
                            <td><a href="{{$dataTender->link_web}}">{{ $cekPeralatan->kode_pokja }}</td>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <td>{{ $cekPeralatan->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Anggaran</th>
                            <td>{{ $cekPeralatan->tahun_anggaran }}</td>
                        </tr>
                        <tr>
                            <th>Pemenang</th>
                            <td>{{ $cekPeralatan->pemenang }}</td>
                        </tr>
                        <tr>
                            <th>Spmk</th>
                            <td>{{ $cekPeralatan->spmk }}</td>
                        </tr>
                        <tr>
                            <th>Spmk Selesai</th>
                            <td>{{ $cekPeralatan->spmk_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Peralatan Syarat</th>
                            <td>{{ $cekPeralatan->peralatan_syarat }}</td>
                        </tr>
                        <tr>
                            <th>Peralatan Ditawarkan</th>
                            <td>{{ $cekPeralatan->peralatan_ditawarkan }}</td>
                        </tr>
                        <!-- Tambahkan informasi lain sesuai kebutuhan -->
                    </tbody>
                </table>

                <!-- Show Data Tender Info -->
                <div class="table-responsive">
                    <h5 class="card-title mt-4">Informasi Data Tender</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <!-- Pastikan dataTender tidak null sebelum mengakses propertinya -->
                            @if ($dataTender)
                            <tr>
                                <th>Kode Tender</th>
                                <td>{{ $dataTender->kd_tender }}</td>
                                <th>Link Web</th>
                                <td>{{ $dataTender->link_web }}</td>
                                <th>Pagu</th>
                                <td>{{ $dataTender->pagu }}</td>
                                <th>HPS</th>
                                <td>{{ $dataTender->hps }}</td>
                                <th>Satuan Kerja</th>
                                <td>{{ $dataTender->satuan_kerja }}</td>
                                <th>PPK</th>
                                <td>{{ $dataTender->ppk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Instansi</th>
                                <td>{{ $dataTender->nama_instansi }}</td>
                                <th>Nilai Penawaran</th>
                                <td>{{ $dataTender->nilai_penawaran }}</td>
                                <th>Tanggal Penetapan</th>
                                <td>{{ $dataTender->tanggal_penetapan }}</td>
                                <th>Nilai Kontrak</th>
                                <td>{{ $dataTender->nilai_kontrak }}</td>
                                <th>Tanggal Kontrak</th>
                                <td>{{ $dataTender->tanggal_kontrak }}</td>
                                <th>Waktu Pelaksanaan</th>
                                <td>{{ $dataTender->waktu_pelaksanaan }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain sesuai kebutuhan -->
                            @else
                            <tr>
                                <td colspan="2">Data Tender tidak ditemukan</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.cek_peralatans.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
</x-app-layout>