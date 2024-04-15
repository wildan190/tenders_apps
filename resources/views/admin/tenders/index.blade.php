<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Tender</h1>
        <p class="text-gray-600 mb-4">Daftar Tender yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                    <!-- Tombol Tambah Data -->
                    <div class="btn-group">
                        <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400" id="dataTable">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Kode Tender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tahun
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Paket
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Catatan Tim Pelaksana
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Usulan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data PPK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenders as $tender)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $tender->kodeTender }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tender->tahun }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tender->namaPaket }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $tender->catatanTimPelaksana }}" target="_blank">Lihat Data</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $tender->usulan }}" target="_blank">Lihat Data</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $tender->dataPpk }}" target="_blank">Lihat Data</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.tenders.edit', $tender->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.tenders.destroy', $tender->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #fff; background-color: #dc3545; border-color: #dc3545;" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Tender ini?')">
                                            <i class="fas fa-trash"></i> Hapus
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 10,
            });
        });
    </script>
    @endpush
</x-app-layout>
