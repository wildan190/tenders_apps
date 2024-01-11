<!-- resources/views/admin/cek_personils/edit.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Cek Personil</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk mengedit data cek personil.</p>

        <!-- Form untuk Edit Data -->
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_personils.update', $cekPersonil->id) }}">
                    @csrf
                    @method('PUT')

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
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama_personil">Nama Personil:</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama_personil" name="nama_personil" required value="{{ $cekPersonil->nama_personil }}">
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="jabatan_personil">Jabatan Personil:</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jabatan_personil" name="jabatan_personil" required value="{{ $cekPersonil->jabatan_personil }}">
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nik_personil">NIK Personil:</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nik_personil" name="nik_personil" required value="{{ $cekPersonil->nik_personil }}">
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="npwp_personil">NPWP Personil:</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="npwp_personil" name="npwp_personil" required value="{{ $cekPersonil->npwp_personil }}">
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email_personil">Email Personil:</label>
                        <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="email_personil" name="email_personil" required value="{{ $cekPersonil->email_personil }}">
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="telepon_personil">Telepon Personil:</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="telepon_personil" name="telepon_personil" required value="{{ $cekPersonil->telepon_personil }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.cek_personils.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>