<!-- resources/views/admin/data_tenders/create.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Tender</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan data tender baru.</p>

        <!-- Form untuk Tambah Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.data_tenders.store') }}">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <!-- Kode Tender -->
                        <div class="form-group col-md-6">
                            <label for="kd_tender">Kode Tender:</label>
                            <input type="text" class="form-control" id="kd_tender" name="kd_tender" placeholder="Contoh: TDR123" required>
                        </div>

                        <!-- Nama Paket -->
                        <div class="form-group col-md-6">
                            <label for="nama_paket">Nama Paket:</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Contoh: Pembangunan Jalan" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Link Web -->
                        <div class="form-group col-md-6">
                            <label for="link_web">Link Web:</label>
                            <input type="text" class="form-control" id="link_web" name="link_web" placeholder="Contoh: http://www.tenderweb.com">
                        </div>

                        <!-- Di dalam form pada create.blade.php -->
                        <div class="form-group col-md-6">
                            <label for="kode_pokja">Kode Pokja:</label>
                            <select class="form-control" id="kode_pokja" name="kode_pokja" required>
                                @foreach($kodePokjas as $kodePokja)
                                <option value="{{ $kodePokja->id }}">{{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <!-- Pagu -->
                        <div class="form-group col-md-6">
                            <label for="pagu">Pagu:</label>
                            <input type="text" class="form-control" id="pagu" name="pagu" placeholder="Contoh: 1000000000" required>
                        </div>

                        <!-- HPS -->
                        <div class="form-group col-md-6">
                            <label for="hps">HPS:</label>
                            <input type="text" class="form-control" id="hps" name="hps" placeholder="Contoh: 900000000" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Satuan Kerja -->
                        <div class="form-group col-md-6">
                            <label for="satuan_kerja">Satuan Kerja:</label>
                            <input type="text" class="form-control" id="satuan_kerja" name="satuan_kerja" placeholder="Contoh: Dinas Pekerjaan Umum" required>
                        </div>

                        <!-- PPK -->
                        <div class="form-group col-md-6">
                            <label for="ppk">PPK:</label>
                            <input type="text" class="form-control" id="ppk" name="ppk" placeholder="Contoh: Budi Santoso" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Nama Instansi -->
                        <div class="form-group col-md-6">
                            <label for="nama_instansi">Nama Instansi:</label>
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Contoh: Kantor Pemerintah Kota Surabaya" required>
                        </div>

                        <!-- Nilai Penawaran -->
                        <div class="form-group col-md-6">
                            <label for="nilai_penawaran">Nilai Penawaran:</label>
                            <input type="text" class="form-control" id="nilai_penawaran" name="nilai_penawaran" placeholder="Contoh: 950000000" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tanggal Penetapan -->
                        <div class="form-group col-md-6">
                            <label for="tanggal_penetapan">Tanggal Penetapan:</label>
                            <input type="date" class="form-control" id="tanggal_penetapan" name="tanggal_penetapan" required>
                        </div>

                        <!-- Nilai Kontrak -->
                        <div class="form-group col-md-6">
                            <label for="nilai_kontrak">Nilai Kontrak:</label>
                            <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" placeholder="Contoh: 900000000">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tanggal Kontrak -->
                        <div class="form-group col-md-6">
                            <label for="tanggal_kontrak">Tanggal Kontrak:</label>
                            <input type="date" class="form-control" id="tanggal_kontrak" name="tanggal_kontrak">
                        </div>

                        <!-- Waktu Pelaksanaan -->
                        <div class="form-group col-md-6">
                            <label for="waktu_pelaksanaan">Waktu Pelaksanaan:</label>
                            <input type="text" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" placeholder="Contoh: 12 bulan">
                        </div>

                        <!-- tahun -->
                        <div class="form-group col-md-6">
                            <label for="tahun">Tahun:</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Contoh: 2024">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pokja_id">Pilih Pokja:</label>
                            <select class="form-control" id="pokja_id" name="pokja_id[]" multiple>
                                @foreach($pokjas as $pokja)
                                <option value="{{ $pokja->id }}">{{ $pokja->nama }} - {{ $pokja->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.data_tenders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>