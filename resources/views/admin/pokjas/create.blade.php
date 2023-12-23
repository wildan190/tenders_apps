<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Tambah Data Pokja</h1>
        <p class="text-gray-600 mb-4">Isi formulir di bawah ini untuk menambahkan data Pokja.</p>

        <!-- Form untuk Tambah Data -->
        <div class="bg-white shadow-md rounded-md p-4">
            <form method="POST" action="{{ route('admin.pokjas.store') }}">
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
                
                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" id="nama" name="nama" required placeholder="Masukkan Nama">
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="jabatan" class="block text-sm font-medium text-gray-600">Jabatan:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" id="jabatan" name="jabatan" required placeholder="Masukkan Jabatan">
                    </div>
                </div>

                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="golongan" class="block text-sm font-medium text-gray-600">Golongan:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" id="golongan" name="golongan" required placeholder="Masukkan Golongan">
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="nik" class="block text-sm font-medium text-gray-600">NIK:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" id="nik" name="nik" required placeholder="Masukkan NIK">
                    </div>
                </div>

                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="npwp" class="block text-sm font-medium text-gray-600">NPWP:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md" id="npwp" name="npwp" required placeholder="Masukkan NPWP">
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                        <input type="email" class="mt-1 p-2 w-full border rounded-md" id="email" name="email" required placeholder="Masukkan Email">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="telepon" class="block text-sm font-medium text-gray-600">Telepon:</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="telepon" name="telepon" required placeholder="Masukkan Telepon">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mr-2">Simpan</button>
                    <a href="{{ route('admin.pokjas.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
