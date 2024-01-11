<!-- resources/views/admin/spt_penelitis/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Tambah Data SPT Peneliti</h1>
        <p class="text-gray-600 mb-4">Isi formulir di bawah untuk menambahkan data SPT Peneliti.</p>

        <!-- Form -->
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="card-body">
                <form action="{{ route('admin.spt_penelitis.store') }}" method="POST">
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
                            @foreach($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}">{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="nomor_spt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor SPT</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nomor_spt" name="nomor_spt" placeholder="Masukkan Nomor SPT" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
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
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="tanggal_spt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal SPT</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal_spt" name="tanggal_spt" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="anggota_peneliti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggota Peneliti</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="anggota_peneliti" name="anggota_peneliti" placeholder="Masukkan Anggota Peneliti" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan" required></textarea>
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