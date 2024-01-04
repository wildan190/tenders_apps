<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Surat Penyampaian</h1>
        <p class="mb-4">Isi formulir di bawah untuk mengedit data Surat Penyampaian.</p>

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.surat_penyampaians.update', $suratPenyampian->id) }}" method="POST">
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



                    <!-- Kode Tender -->
                    <div class="mb-3 flex flex-col">
                        <label for="kd_tender" class="mb-1">Kode Tender</label>
                        <select class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kd_tender" name="kd_tender" required>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->id }}" {{ $dataTender->id == $suratPenyampian->kd_tender ? 'selected' : '' }}>
                                {{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nomor Surat Penyampaian -->
                    <div class="mb-3 flex flex-col">
                        <label for="nomor_surat_penyampaian" class="mb-1">Nomor Surat Penyampaian</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nomor_surat_penyampaian" name="nomor_surat_penyampaian" value="{{ $suratPenyampian->nomor_surat_penyampaian }}" required>
                    </div>

                    <!-- Tahun -->
                    <div class="mb-3 flex flex-col">
                        <label for="tahun" class="mb-1">Tahun</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tahun" name="tahun" value="{{ $suratPenyampian->tahun }}" required>
                    </div>

                    <!-- Sifat -->
                    <div class="mb-3 flex flex-col">
                        <label for="sifat" class="mb-1">Sifat</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="sifat" name="sifat" value="{{ $suratPenyampian->sifat }}" required>
                    </div>

                    <!-- Destinasi Kepada -->
                    <div class="mb-3 flex flex-col">
                        <label for="destinasi_kepada" class="mb-1">Destinasi Kepada</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="destinasi_kepada" name="destinasi_kepada" value="{{ $suratPenyampian->destinasi_kepada }}" required>
                    </div>

                    <!-- Lampiran -->
                    <div class="mb-3 flex flex-col">
                        <label for="lampiran" class="mb-1">Lampiran</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="lampiran" name="lampiran" value="{{ $suratPenyampian->lampiran }}" required>
                    </div>

                    <!-- Perihal -->
                    <div class="mb-3 flex flex-col">
                        <label for="perihal" class="mb-1">Perihal</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="perihal" name="perihal" value="{{ $suratPenyampian->perihal }}" required>
                    </div>

                    <!-- Kepala Balai -->
                    <div class="mb-3 flex flex-col">
                        <label for="kepala_balai" class="mb-1">Kepala Balai</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="kepala_balai" name="kepala_balai" value="{{ $suratPenyampian->kepala_balai }}" required>
                    </div>

                    <!-- NIP -->
                    <div class="mb-3 flex flex-col">
                        <label for="nip" class="mb-1">NIP</label>
                        <input type="text" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="nip" name="nip" value="{{ $suratPenyampian->nip }}" required>
                    </div>

                    <!-- Tanggal Surat -->
                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_surat" class="mb-1">Tanggal Surat</label>
                        <input type="date" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tanggal_surat" name="tanggal_surat" value="{{ $suratPenyampian->tanggal_surat }}" required>
                    </div>

                    <!-- Tanggal Diterima -->
                    <div class="mb-3 flex flex-col">
                        <label for="tanggal_diterima" class="mb-1">Tanggal Diterima</label>
                        <input type="date" class="border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 rounded-md p-2" id="tanggal_diterima" name="tanggal_diterima" value="{{ $suratPenyampian->tanggal_diterima }}" required>
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