<!-- resources/views/admin/data_tenders/show.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Data Tender</h1>
        <p class="mb-4 text-primary">Informasi detail mengenai data tender.</p>

        <!-- DataTender Info -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="font-weight-bold">Informasi Tender</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" class="w-25">Kode Tender</th>
                            <td><a href="{{ $dataTender->link_web }}" target="_blank">{{ $dataTender->kd_tender }}</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Paket</th>
                            <td>{{ $dataTender->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kode Pokja</th>
                            <td>{{ $dataTender->kodePokja->kode_pokja }} - {{ $dataTender->kodePokja->keterangan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pagu</th>
                            <td>{{ $dataTender->pagu }}</td>
                        </tr>
                        <tr>
                            <th scope="row">HPS</th>
                            <td>{{ $dataTender->hps }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Satuan Kerja</th>
                            <td>{{ $dataTender->satuan_kerja }}</td>
                        </tr>
                        <tr>
                            <th scope="row">PPK</th>
                            <td>{{ $dataTender->ppk }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Instansi</th>
                            <td>{{ $dataTender->nama_instansi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nilai Penawaran</th>
                            <td>{{ $dataTender->nilai_penawaran }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Penetapan</th>
                            <td>{{ $dataTender->tanggal_penetapan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nilai Kontrak</th>
                            <td>{{ $dataTender->nilai_kontrak }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Kontrak</th>
                            <td>{{ $dataTender->tanggal_kontrak }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Waktu Pelaksanaan</th>
                            <td>{{ $dataTender->waktu_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tahun</th>
                            <td>{{ $dataTender->tahun }}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mb-4 text-primary">Informasi detail mengenai data tender.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataTender->pokjas as $pokja)
                        <tr>
                            <td>{{ $pokja->nama }}</td>
                            <td>{{ $pokja->jabatan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <!-- Tombol Kembali -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.data_tenders.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>