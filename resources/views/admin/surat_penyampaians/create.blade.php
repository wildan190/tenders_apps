<!-- resources/views/admin/surat_penyampaians/create.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Surat Penyampaian</h1>
        <p class="mb-4">Isi formulir di bawah untuk menambahkan data Surat Penyampaian.</p>

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.surat_penyampaians.store') }}" method="POST">
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

                    <div class="mb-3 flex flex-col">
                        <label for="kd_tender" class="mb-1">Kode Tender</label>
                        <select class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kd_tender" name="kd_tender" required>
                            <option value="" disabled selected>Pilih Kode Tender</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}">{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nomor_surat_penyampaian" class="mb-1">Nomor Surat Penyampaian</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nomor_surat_penyampaian" name="nomor_surat_penyampaian" placeholder="Masukkan Nomor Surat Penyampaian" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="tahun" class="mb-1">Tahun</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="sifat" class="mb-1">Sifat</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="sifat" name="sifat" placeholder="Masukkan Sifat" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="destinasi_kepada" class="mb-1">Destinasi Kepada</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="destinasi_kepada" name="destinasi_kepada" placeholder="Masukkan Destinasi Kepada" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="lampiran" class="mb-1">Lampiran</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="lampiran" name="lampiran" placeholder="Masukkan Lampiran" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="perihal" class="mb-1">Perihal</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="perihal" name="perihal" placeholder="Masukkan Perihal" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="kepala_balai" class="mb-1">Kepala Balai</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kepala_balai" name="kepala_balai" placeholder="Masukkan Nama Kepala Balai" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nip" class="mb-1">NIP</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nip" name="nip" placeholder="Masukkan NIP" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_surat" class="mb-1">Tanggal Surat</label>
                        <input type="date" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tanggal_surat" name="tanggal_surat" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_diterima" class="mb-1">Tanggal Diterima</label>
                        <input type="date" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tanggal_diterima" name="tanggal_diterima" required>
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.spt_penelitis.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>