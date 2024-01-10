<!-- resources/views/admin/cek_peralatans/index.blade.php -->
<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cek Peralatan</h1>
        <p class="mb-4">Daftar cek peralatan</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                        <a href="{{ route('admin.cek_peralatans.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.cek_peralatans.create') }}">Tambah Manual</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Pokja</th>
                                <th>Nama Paket</th>
                                <th>Tahun Anggaran</th>
                                <th>Pemenang</th>
                                <th>SPMK</th>
                                <th>Peralatan Syarat</th>
                                <th>Peralatan Ditawarkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekPeralatans as $cekPeralatan)
                            <tr>
                                <td>{{ $cekPeralatan->id }}</td>
                                <td>{{ $cekPeralatan->kode_pokja }}</td>
                                <td>{{ $cekPeralatan->nama_paket }}</td>
                                <td>{{ $cekPeralatan->tahun_anggaran }}</td>
                                <td>{{ $cekPeralatan->pemenang }}</td>
                                <td>{{ $cekPeralatan->spmk }} s/d {{ $cekPeralatan->spmk_selesai }}</td>
                                <td>{{ $cekPeralatan->peralatan_syarat }}</td>
                                <td><a href="{{ $cekPeralatan->peralatan_ditawarkan }}">Lihat Data</a></td>
                                <td>
                                    <a href="{{ route('admin.cek_peralatans.show', $cekPeralatan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.cek_peralatans.edit', $cekPeralatan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.cek_peralatans.destroy', $cekPeralatan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                    <!-- Tambahkan tombol-tombol lain sesuai kebutuhan -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $cekPeralatans->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>