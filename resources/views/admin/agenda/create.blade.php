<x-app-layout>
    <div class="container mx-auto mt-5">
        <!-- Page Heading -->
        <h1 class="text-3xl font-bold mb-2 text-gray-800">Tambah Data Agenda Rapat</h1>
        <p class="mb-4 text-gray-600">Isi formulir di bawah ini untuk menambahkan data agenda rapat.</p>

        <!-- Form untuk Tambah Data -->
        <div class="bg-white p-6 shadow-md rounded-md">
            <form method="POST" action="{{ route('admin.agenda.store') }}">
                @csrf

                <!-- Email Peserta -->
                <div class="mb-4">
                    <label for="email_peserta" class="block text-sm font-medium text-gray-600">Email Peserta:</label>
                    <input type="email" class="mt-1 p-2 w-full border rounded-md" id="email_peserta" name="email_peserta" required placeholder="Masukkan Email Peserta">
                </div>

                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-600">Tanggal:</label>
                    <input type="date" class="mt-1 p-2 w-full border rounded-md" id="tanggal" name="tanggal" required placeholder="Pilih Tanggal">
                </div>

                <!-- Waktu -->
                <div class="mb-4">
                    <label for="waktu" class="block text-sm font-medium text-gray-600">Waktu:</label>
                    <input type="time" class="mt-1 p-2 w-full border rounded-md" id="waktu" name="waktu" required placeholder="Pilih Waktu">
                </div>

                <!-- Subject -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-600">Subject:</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="title" name="title" required placeholder="Masukkan Subject">
                </div>

                <!-- Tempat -->
                <div class="mb-4">
                    <label for="tempat" class="block text-sm font-medium text-gray-600">Tempat:</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="tempat" name="tempat" required placeholder="Masukkan Tempat">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi:</label>
                    <textarea class="mt-1 p-2 w-full border rounded-md" id="deskripsi" name="deskripsi" rows="4" required placeholder="Masukkan Deskripsi"></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    <a href="{{ route('admin.agenda.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Batal</a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // SweetAlert untuk konfirmasi pembatalan
            $('#cancelBtn').on('click', function() {
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
                        window.location.href = "{{ route('admin.agenda.index') }}";
                    }
                });
            });

            // SweetAlert untuk konfirmasi pengiriman formulir
            $('#submitBtn').on('click', function() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyimpan data agenda rapat!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lanjutkan dengan mengirim formulir
                        $('form').submit();
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>