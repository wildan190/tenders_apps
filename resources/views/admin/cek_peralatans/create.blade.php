<!-- resources/views/admin/cek_peralatans/create.blade.php -->
<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Cek Peralatan</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan data cek peralatan.</p>

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.cek_peralatans.store') }}" method="POST">
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
                        <label for="kode_pokja">Kode Pokja</label>
                        <select class="form-control" id="kode_pokja" name="kode_pokja" required>
                            <option value="" disabled selected>Pilih Kode Pokja</option>
                            @foreach ($kodePokjas as $kodePokja)
                            <option value="{{ $kodePokja->id }}">{{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <select class="form-control" id="nama_paket" name="nama_paket" required>
                            <option value="" disabled selected>Pilih Nama Paket</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->nama_paket }}">{{ $dataTender->nama_paket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tahun_anggaran">Tahun Anggaran</label>
                        <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" placeholder="Masukkan Tahun Anggaran" required>
                    </div>
                    <div class="form-group">
                        <label for="pemenang">Pemenang</label>
                        <select class="form-control" id="pemenang" name="pemenang" required>
                            <option value="" disabled selected>Pilih Pemenang</option>
                            @foreach ($dataTenders as $dataTender)
                            <option value="{{ $dataTender->nama_instansi }}">{{ $dataTender->nama_instansi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="spmk">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="spmk" name="spmk" required>
                    </div>

                    <div class="form-group">
                        <label for="spmk_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="spmk_selesai" name="spmk_selesai" required>
                    </div>

                    <div class="form-group">
                        <label for="peralatan_syarat">Peralatan Syarat</label>
                        <input type="text" class="form-control" id="peralatan_syarat" name="peralatan_syarat" placeholder="Masukkan Peralatan Syarat" required>
                    </div>
                    <div class="form-group">
                        <label for="peralatan_ditawarkan">Peralatan Ditawarkan</label>
                        <input type="text" class="form-control" id="peralatan_ditawarkan" name="peralatan_ditawarkan" placeholder="Masukkan Peralatan Ditawarkan" required>
                    </div>
                    <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
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