<!-- resources/views/admin/kode_pokjas/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kode Pokja</h1>
        <p class="mb-4">Daftar Kode Pokja yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                    <a href="{{ route('admin.kode_pokjas.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.kode_pokjas.create') }}">Tambah Manual</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#importModal">Import Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Pokja</th>
                                <th>Keterangan</th>
                                <th>Aksi</th> <!-- Tambah kolom untuk aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kodePokjas as $kodePokja)
                            <tr>
                                <td>{{ $kodePokja->kode_pokja }}</td>
                                <td>{{ $kodePokja->keterangan }}</td>
                                <td>
                                    <a href="{{ route('admin.kode_pokjas.show', $kodePokja->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.kode_pokjas.edit', $kodePokja->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.kode_pokjas.destroy', $kodePokja->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kode pokja ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
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

    <!-- Import Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data Kode Pokja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Import -->
                    <form method="POST" action="{{ route('admin.kode_pokjas.import') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <a href="{{ route('admin.kode_pokjas.export-template') }}" class="btn btn-outline-primary">Unduh Template</a>
                        </div>

                        <div class="mb-3">
                            <label for="importFile">Pilih File</label>
                            <input type="file" class="form-control-file" id="importFile" name="importFile" required>
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
