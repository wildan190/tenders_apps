<!-- resources/views/admin/data_surat_keputusan/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Surat Keputusan</h1>
        <p class="mb-4">Edit data surat keputusan.</p>

        <!-- Form Edit -->
        <form action="{{ route('admin.data_surat_keputusans.update', $dataSuratKeputusan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Kode Tender -->
            <div class="form-group">
                <label for="kd_tender">Kode Tender</label>
                <select class="form-control" id="kd_tender" name="kd_tender" required>
                    <option value="" disabled>Select Kode Tender</option>
                    @foreach($dataTenders as $dataTender)
                        <option value="{{ $dataTender->id }}" {{ $dataTender->id == $dataSuratKeputusan->kd_tender ? 'selected' : '' }}>
                            {{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nomor SK -->
            <div class="form-group">
                <label for="nomor_sk">Nomor SK</label>
                <input type="text" class="form-control" id="nomor_sk" name="nomor_sk" value="{{ $dataSuratKeputusan->nomor_sk }}" required placeholder="Masukkan Nomor SK">
            </div>

            <!-- Nomor Surat -->
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $dataSuratKeputusan->nomor_surat }}" required placeholder="Masukkan Nomor Surat">
            </div>

            <!-- Tahun -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $dataSuratKeputusan->tahun }}" required placeholder="Masukkan Tahun">
            </div>

            <!-- Tanggal Terbit -->
            <div class="form-group">
                <label for="tanggal_terbit">Tanggal Terbit</label>
                <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" value="{{ $dataSuratKeputusan->tanggal_terbit }}" required placeholder="Pilih Tanggal Terbit">
            </div>

            <!-- Pembuat Komitmen -->
            <div class="form-group">
                <label for="pembuat_komitmen">Pembuat Komitmen</label>
                <select class="form-control" id="pembuat_komitmen" name="pembuat_komitmen" required>
                    <option value="" disabled>Select Pembuat Komitmen</option>
                    @foreach($cekPersonils as $cekPersonil)
                        <option value="{{ $cekPersonil->nama_personil }}" {{ $cekPersonil->nama_personil == $dataSuratKeputusan->pembuat_komitmen ? 'selected' : '' }}>
                            {{ $cekPersonil->nama_personil }} - {{ $cekPersonil->jabatan_personil }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Simpan
                </button>
                <a href="{{ route('admin.data_surat_keputusans.index', $dataSuratKeputusan->id) }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
