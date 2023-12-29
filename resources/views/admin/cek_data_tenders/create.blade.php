<!-- resources/views/admin/cek_data_tenders/create.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Cek Data Tender</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan cek data tender baru.</p>

        <!-- Form untuk Tambah Cek Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_data_tenders.store') }}">
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

                    <!-- Nama Personil -->
                    <div class="form-group">
                        <label for="nama_personil">Nama Personil:</label>
                        <select class="form-control" id="cek_personil_id" name="cek_personil_id" required>
                            @foreach($cekPersonils as $cekPersonil)
                            <option value="{{ $cekPersonil->id }}">{{ $cekPersonil->nama_personil }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Data Tender -->
                    <div class="form-group">
                        <label for="data_tender_id">Data Tender:</label>
                        <select class="form-control" id="data_tender_id" name="data_tender_id" required>
                            @foreach($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}">{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.cek_data_tenders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>