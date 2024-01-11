<!-- resources/views/admin/cek_peralatans/index.blade.php -->
<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cek Peralatan</h1>
        <p class="text-gray-600 mb-4">Daftar cek peralatan</p>

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
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Kode Pokja</th>
                                <th scope="col" class="px-6 py-3">Nama Paket</th>
                                <th scope="col" class="px-6 py-3">Tahun Anggaran</th>
                                <th scope="col" class="px-6 py-3">Pemenang</th>
                                <th scope="col" class="px-6 py-3">SPMK</th>
                                <th scope="col" class="px-6 py-3">Peralatan Syarat</th>
                                <th scope="col" class="px-6 py-3">Peralatan Ditawarkan</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekPeralatans as $cekPeralatan)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $cekPeralatan->id }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->kode_pokja }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->nama_paket }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->tahun_anggaran }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->pemenang }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->spmk }} s/d {{ $cekPeralatan->spmk_selesai }}</td>
                                <td class="px-6 py-4">{{ $cekPeralatan->peralatan_syarat }}</td>
                                <td class="px-6 py-4"><a href="{{ $cekPeralatan->peralatan_ditawarkan }}">Lihat Data</a></td>
                                <td class="px-6 py-4">
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