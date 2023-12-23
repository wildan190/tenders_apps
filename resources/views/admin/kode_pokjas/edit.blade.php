<x-app-layout>
    <div class="container mx-auto mt-6 p-4">
        <!-- Page Heading -->
        <h1 class="text-3xl font-semibold mb-2">Edit Data Kode Pokja</h1>
        <p class="text-gray-600 mb-6">Isi formulir di bawah ini untuk mengedit data Kode Pokja.</p>

        <!-- Form untuk Edit Data -->
        <div class="bg-white rounded-md p-6 shadow-md">
            <form method="POST" action="{{ route('admin.kode_pokjas.update', $kodePokja->id) }}">
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

                <!-- Nama Kode Pokja -->
                <div class="mb-4">
                    <label for="kode_pokja" class="block text-sm font-medium text-gray-600">Kode Pokja:</label>
                    <input type="text" id="kode_pokja" name="kode_pokja" class="mt-1 p-2 w-full border rounded-md" required value="{{ $kodePokja->kode_pokja }}">
                </div>

                <!-- Keterangan -->
                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-600">Keterangan:</label>
                    <textarea id="keterangan" name="keterangan" rows="4" class="mt-1 p-2 w-full border rounded-md" required>{{ $kodePokja->keterangan }}</textarea>
                </div>

                <!-- Tombol Simpan dan Batal -->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Simpan
                    </button>
                    <a href="{{ route('admin.kode_pokjas.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert untuk konfirmasi pembatalan
            document.getElementById('cancelBtn').addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan kehilangan perubahan yang belum disimpan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, batalkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('admin.kode_pokjas.index') }}";
                    }
                });
            });

            // SweetAlert untuk konfirmasi pengiriman formulir
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyimpan perubahan data Kode Pokja!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, simpan perubahan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lanjutkan dengan mengirim formulir
                        e.target.submit();
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>