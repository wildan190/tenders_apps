<x-app-layout>
    <div class="container mx-auto mt-6 p-4">
        <!-- Page Heading -->
        <h1 class="text-3xl font-semibold mb-2">Detail Data Kode Pokja</h1>

        <!-- Informasi Kode Pokja -->
        <div class="bg-white rounded-md p-6 shadow-md">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Kode Pokja:</label>
                <span class="mt-1 p-2 w-full border rounded-md">{{ $kodePokjas->kode_pokja }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Keterangan:</label>
                <p class="mt-1 p-2 w-full border rounded-md">{{ $kodePokjas->keterangan }}</p>
            </div>

            <!-- Tombol Kembali -->
            <div class="flex justify-end">
                <a href="{{ route('admin.kode_pokjas.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
