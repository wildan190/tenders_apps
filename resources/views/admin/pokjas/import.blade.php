<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Data Pokja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('admin.pokjas.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">Pilih File Excel:</label>
                        <input type="file" name="file" id="file" accept=".xlsx, .xls" class="mt-1 p-2">
                    </div>

                    @if(session('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="text-green-500">{{ session('success') }}</div>
                    @endif

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Import Data</button>
                        <a href="{{ route('admin.pokjas.index') }}" class="ml-2 text-gray-500">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
