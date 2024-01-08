<!-- resources/views/admin/cek_personils/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Cek Personil</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk mengedit data cek personil.</p>

        <!-- Form untuk Edit Data -->
        <div class="card shadow mb-4">
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

                    <div class="form-group">
                        <label for="nama_personil">Nama Personil:</label>
                        <input type="text" class="form-control" id="nama_personil" name="nama_personil" required value="{{ $cekPersonil->nama_personil }}">
                    </div>

                    <div class="form-group">
                        <label for="jabatan_personil">Jabatan Personil:</label>
                        <input type="text" class="form-control" id="jabatan_personil" name="jabatan_personil" required value="{{ $cekPersonil->jabatan_personil }}">
                    </div>

                    <div class="form-group">
                        <label for="nik_personil">NIK Personil:</label>
                        <input type="text" class="form-control" id="nik_personil" name="nik_personil" required value="{{ $cekPersonil->nik_personil }}">
                    </div>

                    <div class="form-group">
                        <label for="npwp_personil">NPWP Personil:</label>
                        <input type="text" class="form-control" id="npwp_personil" name="npwp_personil" required value="{{ $cekPersonil->npwp_personil }}">
                    </div>

                    <div class="form-group">
                        <label for="email_personil">Email Personil:</label>
                        <input type="email" class="form-control" id="email_personil" name="email_personil" required value="{{ $cekPersonil->email_personil }}">
                    </div>

                    <div class="form-group">
                        <label for="telepon_personil">Telepon Personil:</label>
                        <input type="text" class="form-control" id="telepon_personil" name="telepon_personil" required value="{{ $cekPersonil->telepon_personil }}">
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