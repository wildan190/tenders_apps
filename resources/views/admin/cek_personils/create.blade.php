<!-- resources/views/admin/cek_personils/create.blade.php -->
<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Cek Personil</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan data cek personil.</p>

        <!-- Form untuk Tambah Data -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_personils.store') }}">
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

                    <div class="form-group">
                        <label for="nama_personil">Nama Personil:</label>
                        <input type="text" class="form-control" id="nama_personil" name="nama_personil" required placeholder="Masukkan Nama Personil">
                    </div>

                    <div class="form-group">
                        <label for="jabatan_personil">Jabatan Personil:</label>
                        <input type="text" class="form-control" id="jabatan_personil" name="jabatan_personil" required placeholder="Masukkan Jabatan Personil">
                    </div>

                    <div class="form-group">
                        <label for="nik_personil">NIK Personil:</label>
                        <input type="text" class="form-control" id="nik_personil" name="nik_personil" required placeholder="Masukkan NIK Personil">
                    </div>

                    <div class="form-group">
                        <label for="npwp_personil">NPWP Personil:</label>
                        <input type="text" class="form-control" id="npwp_personil" name="npwp_personil" required placeholder="Masukkan NPWP Personil">
                    </div>

                    <div class="form-group">
                        <label for="email_personil">Email Personil:</label>
                        <input type="email" class="form-control" id="email_personil" name="email_personil" required placeholder="Masukkan Email Personil">
                    </div>

                    <div class="form-group">
                        <label for="telepon_personil">Telepon Personil:</label>
                        <input type="text" class="form-control" id="telepon_personil" name="telepon_personil" required placeholder="Masukkan Telepon Personil">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.cek_personils.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
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
                        window.location.href = "{{ route('admin.cek_personils.index') }}";
                    }
                });
            });

            // SweetAlert untuk konfirmasi pengiriman formulir
            $('#submitBtn').on('click', function() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyimpan data cek personil!",
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