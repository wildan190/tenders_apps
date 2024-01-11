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

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="kd_tender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Tender</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="kd_tender" name="kd_tender" required>
                            <option value="" disabled selected>Pilih Kode Tender</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}">{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="nomor_surat_penyampaian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat Penyampaian</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nomor_surat_penyampaian" name="nomor_surat_penyampaian" placeholder="Masukkan Nomor Surat Penyampaian" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="sifat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sifat</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="sifat" name="sifat" placeholder="Masukkan Sifat" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="destinasi_kepada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destinasi Kepada</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="destinasi_kepada" name="destinasi_kepada" placeholder="Masukkan Destinasi Kepada" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="lampiran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="lampiran" name="lampiran" placeholder="Masukkan Lampiran" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="perihal" name="perihal" placeholder="Masukkan Perihal" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="kepala_balai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Balai</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="kepala_balai" name="kepala_balai" placeholder="Masukkan Nama Kepala Balai" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nip" name="nip" placeholder="Masukkan NIP" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="tanggal_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal_surat" name="tanggal_surat" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="tanggal_diterima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Diterima</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal_diterima" name="tanggal_diterima" required>
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