<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pokja</h1>
        <p class="mb-4">Daftar Pokja yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pokjas as $pokja)
                            <tr>
                                <td>{{ $pokja->nama }}</td>
                                <td>{{ $pokja->jabatan }}</td>
                                <td>{{ $pokja->golongan }}</td>
                                <td>{{ $pokja->nik }}</td>
                                <td>{{ $pokja->email }}</td>
                                <td>{{ $pokja->telepon }}</td>
                                <td>
                                    <a href="{{ route('admin.pokjas.show', $pokja->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Lihat</a>
                                    <a href="{{ route('admin.pokjas.edit', $pokja->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.pokjas.destroy', $pokja->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data Pokja ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
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
                            <a href="{{ route('admin.pokjas.export-template') }}" class="btn btn-outline-success">Unduh Template</a>
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