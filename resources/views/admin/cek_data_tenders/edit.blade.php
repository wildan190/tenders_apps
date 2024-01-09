<!-- resources/views/admin/cek_data_tenders/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Cek Data Tender</h1>
        <p class="mb-4">Edit formulir di bawah ini untuk mengubah data cek data tender.</p>

        <!-- Form untuk Edit Cek Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_data_tenders.update', $cekDataTender->id) }}">
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

                    <!-- Nama Personil -->
                    <div class="form-group">
                        <label for="cek_personil_id">Nama Personil:</label>
                        <select class="form-control" id="cek_personil_id" name="cek_personil_id" required>
                            @foreach($cekPersonils as $cekPersonil)
                            <option value="{{ $cekPersonil->id }}" @if($cekPersonil->id == $cekDataTender->cek_personil_id) selected @endif>{{ $cekPersonil->nama_personil }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Data Tender -->
                    <div class="form-group">
                        <label for="data_tender_id">Data Tender:</label>
                        <select class="form-control" id="data_tender_id" name="data_tender_id" required>
                            @foreach($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}" @if($dataTender->id == $cekDataTender->data_tender_id) selected @endif>{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}</option>
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
