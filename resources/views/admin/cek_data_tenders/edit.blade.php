<!-- resources/views/admin/cek_data_tenders/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Cek Data Tender</h1>
        <p class="mb-4">Edit informasi cek data tender.</p>

        <!-- Form untuk Edit Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_data_tenders.update', $cekDataTender->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Data Tender -->
                    <h5 class="card-title">Informasi Data Tender</h5>
                    <!-- Tampilkan data-data tender sesuai kebutuhan -->
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kode Tender</th>
                                <td>{{ $cekDataTender->dataTender->kd_tender }}</td>
                            </tr>
                            <tr>
                                <th>Nama Paket</th>
                                <td>{{ $cekDataTender->dataTender->nama_paket }}</td>
                            </tr>
                            <tr>
                                <th>Link Web</th>
                                <td>{{ $cekDataTender->dataTender->link_web }}</td>
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

                    <!-- Informasi Personil -->
                    <h5 class="card-title mt-4">Informasi Personil</h5>
                    <!-- Tampilkan data-data personil sesuai kebutuhan -->
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
                                <th>Golongan Personil</th>
                                <td>{{ $cekDataTender->cekPersonil->golongan_personil }}</td>
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
                                <td>{{ $cekDataTender->cekPersonil->pokjas->implode('nama', ', ') }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain sesuai kebutuhan -->
                        </tbody>
                    </table>


                    <!-- Ubah Status -->
                    <div class="form-group mt-4">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="DITETAPKAN" {{ $cekDataTender->status === 'DITETAPKAN' ? 'selected' : '' }}>DITETAPKAN</option>
                            <option value="DIKERJAKAN" {{ $cekDataTender->status === 'DIKERJAKAN' ? 'selected' : '' }}>DIKERJAKAN</option>
                            <option value="SELESAI" {{ $cekDataTender->status === 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.cek_data_tenders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>