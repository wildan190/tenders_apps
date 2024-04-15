<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Edit Data Cek Peralatan</h1>
        <p class="text-gray-600 mb-4">Isi formulir di bawah ini untuk mengedit data cek peralatan.</p>

        <!-- Form -->
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="card-body">
                <form action="{{ route('admin.cek_peralatans.update', $cekPeralatan->id) }}" method="POST">
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

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="kode_pokja">Kode Pokja</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="kode_pokja" name="kode_pokja" required>
                            <option value="" disabled selected>Pilih Kode Pokja</option>
                            @foreach ($kodePokjas as $kodePokja)
                            <option value="{{ $kodePokja->id }}" {{ $cekPeralatan->kode_pokja == $kodePokja->id ? 'selected' : '' }}>
                                {{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama_paket">Nama Paket</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama_paket" name="nama_paket" required>
                            <option value="" disabled selected>Pilih Nama Paket</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->nama_paket }}" {{ $cekPeralatan->nama_paket == $dataTender->nama_paket ? 'selected' : '' }}>
                                {{ $dataTender->nama_paket }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tahun_anggaran">Tahun Anggaran</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="tahun_anggaran" name="tahun_anggaran" value="{{ $cekPeralatan->tahun_anggaran }}" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label for="pemenang">Pemenang</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="pemenang" name="pemenang" required>
                            <option value="" disabled selected>Pilih Pemenang</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->nama_instansi }}" {{ $cekPeralatan->pemenang == $dataTender->nama_instansi ? 'selected' : '' }}>
                                {{ $dataTender->nama_instansi }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="spmk">Tanggal Mulai</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="spmk" name="spmk" value="{{ $cekPeralatan->spmk }}" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="spmk_selesai">Tanggal Selesai</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="spmk_selesai" name="spmk_selesai" value="{{ $cekPeralatan->spmk_selesai }}" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="peralatan_syarat">Peralatan Syarat</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="peralatan_syarat" name="peralatan_syarat" value="{{ $cekPeralatan->peralatan_syarat }}" required>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="peralatan_ditawarkan">Peralatan Ditawarkan</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun_anggaran" id="peralatan_ditawarkan" name="peralatan_ditawarkan" value="{{ $cekPeralatan->peralatan_ditawarkan }}" required>
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            <i class="fa fa-save"></i>
                            Simpan
                        </button>
                        <a href="{{ route('admin.cek_peralatans.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#spmk", {
                mode: "range",
                dateFormat: "Y-m-d",
                // tambahkan opsi atau konfigurasi lain sesuai kebutuhan
            });

            flatpickr("#spmk_selesai", {
                dateFormat: "Y-m-d",
                // tambahkan opsi atau konfigurasi lain sesuai kebutuhan
            });
        });
    </script>
</x-app-layout>