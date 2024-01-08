<!-- resources/views/admin/cek_personils/show.blade.php -->
<x-app-layout>
    <div class="container mx-auto">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold mb-2 text-gray-800">Detail Cek Personil</h1>
        <p class="text-gray-600 mb-4">Informasi detail cek personil.</p>

        <!-- Card for Displaying Personil Information -->
        <div class="bg-white rounded-md overflow-hidden shadow-md mb-4">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Informasi Personil</h2>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">Nama Personil:</dt>
                        <dd>{{ $cekPersonil->nama_personil }}</dd>
                    </div>
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">Jabatan Personil:</dt>
                        <dd>{{ $cekPersonil->jabatan_personil }}</dd>
                    </div>
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">NIK Personil:</dt>
                        <dd>{{ $cekPersonil->nik_personil }}</dd>
                    </div>
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">NPWP Personil:</dt>
                        <dd>{{ $cekPersonil->npwp_personil }}</dd>
                    </div>
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">Email Personil:</dt>
                        <dd>{{ $cekPersonil->email_personil }}</dd>
                    </div>
                    <div class="mb-2">
                        <dt class="font-semibold text-gray-600">Telepon Personil:</dt>
                        <dd>{{ $cekPersonil->telepon_personil }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Card for Displaying Actions -->
        <div class="bg-white rounded-md overflow-hidden shadow-md">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Aksi</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.cek_personils.edit', $cekPersonil->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.cek_personils.destroy', $cekPersonil->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>