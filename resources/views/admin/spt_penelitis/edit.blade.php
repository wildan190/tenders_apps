<!-- resources/views/admin/spt_penelitis/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data SPT Peneliti</h1>
        <p class="mb-4">Edit formulir di bawah untuk mengubah data SPT Peneliti.</p>

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.spt_penelitis.update', $sptPeneliti->id) }}" method="POST">
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

                    <div class="mb-3 flex flex-col">
                        <label for="kd_tender" class="mb-1">Kode Tender</label>
                        <select class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kd_tender" name="kd_tender" required>
                            <option value="" disabled>Pilih Kode Tender</option>
                            @foreach($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}" {{ $sptPeneliti->kd_tender == $dataTender->id ? 'selected' : '' }}>
                                {{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nomor_spt" class="mb-1">Nomor SPT</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nomor_spt" name="nomor_spt" value="{{ $sptPeneliti->nomor_spt }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="tahun" class="mb-1">Tahun</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tahun" name="tahun" value="{{ $sptPeneliti->tahun }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="kepala_balai" class="mb-1">Kepala Balai</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kepala_balai" name="kepala_balai" value="{{ $sptPeneliti->kepala_balai }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nip" class="mb-1">NIP</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nip" name="nip" value="{{ $sptPeneliti->nip }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="jabatan" class="mb-1">Jabatan</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="jabatan" name="jabatan" value="{{ $sptPeneliti->jabatan }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_spt" class="mb-1">Tanggal SPT</label>
                        <input type="date" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tanggal_spt" name="tanggal_spt" value="{{ $sptPeneliti->tanggal_spt }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="anggota_peneliti" class="mb-1">Anggota Peneliti</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="anggota_peneliti" name="anggota_peneliti" value="{{ $sptPeneliti->anggota_peneliti }}" required>
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="keterangan" class="mb-1">Keterangan</label>
                        <textarea class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="keterangan" name="keterangan" rows="3" required>{{ $sptPeneliti->keterangan }}</textarea>
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.spt_penelitis.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>