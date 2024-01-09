<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Detail Data Pokja</h1>

        <!-- Detail Data -->
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->nama }}</p>
            </div>

            <div class="mb-4">
                <label for="jabatan" class="block text-sm font-medium text-gray-600">Jabatan:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->jabatan }}</p>
            </div>

            <div class="mb-4">
                <label for="golongan" class="block text-sm font-medium text-gray-600">Golongan:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->golongan }}</p>
            </div>

            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->nik }}</p>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->email }}</p>
            </div>

            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-600">Telepon:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $pokja->telepon }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.pokjas.edit', $pokja->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded-md mr-2">Edit</a>
                <a href="{{ route('admin.pokjas.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
