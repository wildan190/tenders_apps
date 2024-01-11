<!-- resources/views/admin/data_surat_keputusan/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat Keputusan</h1>
        <p class="text-gray-600 mb-4">Daftar data surat keputusan yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <div class="btn-group">
                        <a href="{{ route('admin.data_surat_keputusans.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Kode Tender</th>
                                <th scope="col" class="px-6 py-3">Nomor SK</th>
                                <th scope="col" class="px-6 py-3">Nomor Surat</th>
                                <th scope="col" class="px-6 py-3">Tahun</th>
                                <th scope="col" class="px-6 py-3">Tanggal Terbit</th>
                                <th scope="col" class="px-6 py-3">Pembuat Komitmen</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataSuratKeputusan as $suratKeputusan)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $suratKeputusan->kd_tender }}</td>
                                <td class="px-6 py-4">{{ $suratKeputusan->nomor_sk }}</td>
                                <td class="px-6 py-4">{{ $suratKeputusan->nomor_surat }}</td>
                                <td class="px-6 py-4">{{ $suratKeputusan->tahun }}</td>
                                <td class="px-6 py-4">{{ $suratKeputusan->tanggal_terbit }}</td>
                                <td class="px-6 py-4">{{ $suratKeputusan->pembuat_komitmen }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.data_surat_keputusans.show', $suratKeputusan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.data_surat_keputusans.edit', $suratKeputusan->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.data_surat_keputusans.destroy', $suratKeputusan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 10,
            });
        });
    </script>
    @endpush
</x-app-layout>