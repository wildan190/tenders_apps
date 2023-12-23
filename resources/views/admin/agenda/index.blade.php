<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agenda Rapat</h1>
        <p class="mb-4">Daftar Agenda Rapat yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.agenda.create') }}">Tambah Manual</a>
                            <a class="dropdown-item" href="#">Import Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Perihal</th>
                                <th>Email Peserta</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Tempat</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendaRapat as $agenda)
                            <tr>
                                <td>{{ $agenda->title }}</td>
                                <td>{{ $agenda->email_peserta }}</td>
                                <td>{{ $agenda->tanggal }}</td>
                                <td>{{ $agenda->waktu }}</td>
                                <td>{{ $agenda->tempat }}</td>
                                <td>{{ $agenda->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('admin.agenda.show', $agenda->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $agendaRapat->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- ... (kode selanjutnya) ... -->
</x-app-layout>
