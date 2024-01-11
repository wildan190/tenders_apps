<x-app-layout>
    <div class="container mx-auto mt-4 p-4">
        <!-- Page Heading -->
        <h1 class="text-3xl font-bold mb-2 text-gray-800">Tambah Data Agenda Rapat</h1>
        <p class="text-gray-600 mb-4">Isi formulir di bawah ini untuk menambahkan data agenda rapat.</p>

        <!-- Form untuk Tambah Data -->
        <div class="bg-white shadow-md rounded-md p-4">
            <form method="POST" action="{{ route('admin.agenda.store') }}">
                @csrf

                <!-- Email Peserta -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="email_peserta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Peserta:</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="email_peserta" name="email_peserta" required placeholder="Masukkan Email Peserta">
                </div>

                <!-- Tanggal -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal:</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal" name="tanggal" required placeholder="Pilih Tanggal">
                </div>

                <!-- Waktu -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu:</label>
                    <input type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="waktu" name="waktu" required placeholder="Pilih Waktu">
                </div>

                <!-- Subject -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="title" name="title" required placeholder="Masukkan Subject">
                </div>

                <!-- Tempat -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat:</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tempat" name="tempat" required placeholder="Masukkan Tempat">
                </div>

                <!-- Deskripsi -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi:</label>
                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="deskripsi" name="deskripsi" rows="4" required placeholder="Masukkan Deskripsi"></textarea>
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