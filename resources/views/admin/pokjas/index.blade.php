<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pokja</h1>
        <p class="text-gray-600 mb-4">Daftar Pokja yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                    <!-- Tombol Import -->
                    <div class="btn-group">
                        <a href="{{ route('admin.pokjas.create') }}" class="btn btn-primary">Tambah Data</a>

                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Tombol Import -->
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#importModal">Import Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jabatan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Golongan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pokjas as $pokja)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $pokja->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pokja->jabatan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pokja->golongan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pokja->nik }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pokja->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pokja->telepon }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.pokjas.show', $pokja->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.pokjas.edit', $pokja->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.pokjas.destroy', $pokja->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #fff; background-color: #dc3545; border-color: #dc3545;" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Pokja ini?')">
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
            <div class="card-footer">
                {{ $pokjas->links() }}
            </div>
        </div>
    </div>
    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data Pokja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Import -->
                    <form method="POST" action="{{ route('admin.pokjas.import') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <a href="{{ route('admin.pokjas.export-template') }}" class="btn btn-outline-primary">Unduh Template</a>
                        </div>

                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="importFile">Pilih File</label>
                            <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="importFile" name="importFile" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
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