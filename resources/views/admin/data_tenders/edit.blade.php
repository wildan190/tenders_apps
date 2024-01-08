<!-- resources/views/admin/data_tenders/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Tender</h1>
        <p class="mb-4">Edit formulir di bawah ini untuk mengubah data tender.</p>

        <!-- Form untuk Edit Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.data_tenders.update', $dataTender->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Kode Tender -->
                    <div class="form-group">
                        <label for="kd_tender">Kode Tender:</label>
                        <input type="text" class="form-control" id="kd_tender" name="kd_tender" value="{{ $dataTender->kd_tender }}" required>
                    </div>

                    <!-- Nama Paket -->
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket:</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $dataTender->nama_paket }}" required>
                    </div>

                    <!-- Link Web -->
                    <div class="form-group">
                        <label for="link_web">Link Web:</label>
                        <input type="text" class="form-control" id="link_web" name="link_web" value="{{ $dataTender->link_web }}">
                    </div>

                    <!-- Kode Pokja -->
                    <div class="form-group">
                        <label for="kode_pokja">Kode Pokja:</label>
                        <select class="form-control" id="kode_pokja" name="kode_pokja" required>
                            @foreach($kodePokjas as $kodePokja)
                            <option value="{{ $kodePokja->id }}" {{ $dataTender->kode_pokja == $kodePokja->id ? 'selected' : '' }}>
                                {{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pagu -->
                    <div class="form-group">
                        <label for="pagu">Pagu:</label>
                        <input type="text" class="form-control" id="pagu" name="pagu" value="{{ $dataTender->pagu }}" required>
                    </div>

                    <!-- HPS -->
                    <div class="form-group">
                        <label for="hps">HPS:</label>
                        <input type="text" class="form-control" id="hps" name="hps" value="{{ $dataTender->hps }}" required>
                    </div>

                    <!-- Satuan Kerja -->
                    <div class="form-group">
                        <label for="satuan_kerja">Satuan Kerja:</label>
                        <input type="text" class="form-control" id="satuan_kerja" name="satuan_kerja" value="{{ $dataTender->satuan_kerja }}" required>
                    </div>

                    <!-- PPK -->
                    <div class="form-group">
                        <label for="ppk">PPK:</label>
                        <input type="text" class="form-control" id="ppk" name="ppk" value="{{ $dataTender->ppk }}" required>
                    </div>

                    <!-- Nama Instansi -->
                    <div class="form-group">
                        <label for="nama_instansi">Nama Instansi:</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ $dataTender->nama_instansi }}" required>
                    </div>

                    <!-- Nilai Penawaran -->
                    <div class="form-group">
                        <label for="nilai_penawaran">Nilai Penawaran:</label>
                        <input type="text" class="form-control" id="nilai_penawaran" name="nilai_penawaran" value="{{ $dataTender->nilai_penawaran }}" required>
                    </div>

                    <!-- Tanggal Penetapan -->
                    <div class="form-group">
                        <label for="tanggal_penetapan">Tanggal Penetapan:</label>
                        <input type="date" class="form-control" id="tanggal_penetapan" name="tanggal_penetapan" value="{{ $dataTender->tanggal_penetapan }}" required>
                    </div>

                    <!-- Nilai Kontrak -->
                    <div class="form-group">
                        <label for="nilai_kontrak">Nilai Kontrak:</label>
                        <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" value="{{ $dataTender->nilai_kontrak }}">
                    </div>

                    <!-- Tanggal Kontrak -->
                    <div class="form-group">
                        <label for="tanggal_kontrak">Tanggal Kontrak:</label>
                        <input type="date" class="form-control" id="tanggal_kontrak" name="tanggal_kontrak" value="{{ $dataTender->tanggal_kontrak }}">
                    </div>

                    <!-- tahun -->
                    <div class="form-group col-md-6">
                        <label for="tahun">Tahun:</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $dataTender->tahun }}">
                    </div>

                    <!-- Tombol Update -->
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