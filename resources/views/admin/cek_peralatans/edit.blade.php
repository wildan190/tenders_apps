<!-- resources/views/admin/cek_peralatans/edit.blade.php -->
<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Cek Peralatan</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk mengedit data cek peralatan.</p>

        <!-- Form -->
        <div class="card shadow mb-4">
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

                    <div class="form-group">
                        <label for="kode_pokja">Kode Pokja</label>
                        <select class="form-control" id="kode_pokja" name="kode_pokja" required>
                            <option value="" disabled selected>Pilih Kode Pokja</option>
                            @foreach ($kodePokjas as $kodePokja)
                                <option value="{{ $kodePokja->id }}" {{ $cekPeralatan->kode_pokja == $kodePokja->id ? 'selected' : '' }}>
                                    {{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <select class="form-control" id="nama_paket" name="nama_paket" required>
                            <option value="" disabled selected>Pilih Nama Paket</option>
                            @foreach ($dataTenders as $dataTender)
                                <option value="{{ $dataTender->nama_paket }}" {{ $cekPeralatan->nama_paket == $dataTender->nama_paket ? 'selected' : '' }}>
                                    {{ $dataTender->nama_paket }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tahun_anggaran">Tahun Anggaran</label>
                        <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="{{ $cekPeralatan->tahun_anggaran }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pemenang">Pemenang</label>
                        <select class="form-control" id="pemenang" name="pemenang" required>
                            <option value="" disabled selected>Pilih Pemenang</option>
                            @foreach ($dataTenders as $dataTender)
                                <option value="{{ $dataTender->nama_instansi }}" {{ $cekPeralatan->pemenang == $dataTender->nama_instansi ? 'selected' : '' }}>
                                    {{ $dataTender->nama_instansi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="spmk">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="spmk" name="spmk" value="{{ $cekPeralatan->spmk }}" required>
                    </div>

                    <div class="form-group">
                        <label for="spmk_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="spmk_selesai" name="spmk_selesai" value="{{ $cekPeralatan->spmk_selesai }}" required>
                    </div>

                    <div class="form-group">
                        <label for="peralatan_syarat">Peralatan Syarat</label>
                        <input type="text" class="form-control" id="peralatan_syarat" name="peralatan_syarat" value="{{ $cekPeralatan->peralatan_syarat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="peralatan_ditawarkan">Peralatan Ditawarkan</label>
                        <input type="text" class="form-control" id="peralatan_ditawarkan" name="peralatan_ditawarkan" value="{{ $cekPeralatan->peralatan_ditawarkan }}" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.cek_peralatans.index') }}" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
