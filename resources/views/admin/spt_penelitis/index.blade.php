<!-- resources/views/admin/spt_penelitis/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data SPT Peneliti</h1>
        <p class="mb-4">Daftar SPT Peneliti yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                    <!-- Tombol Tambah Data dan Import -->
                    <div class="btn-group">
                        <a href="{{ route('admin.spt_penelitis.create') }}" class="btn btn-primary">Tambah Data</a>

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
                                <th>No</th>
                                <th>Kode Tender</th>
                                <th>Nomor SPT</th>
                                <th>Tahun</th>
                                <th>Kepala Balai</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Tanggal SPT</th>
                                <th>Anggota Peneliti</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Looping data SPT Peneliti -->
                            @foreach ($sptPenelitis as $key => $sptPeneliti)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sptPeneliti->kd_tender }}</td>
                                <td>{{ $sptPeneliti->nomor_spt }}</td>
                                <td>{{ $sptPeneliti->tahun }}</td>
                                <td>{{ $sptPeneliti->kepala_balai }}</td>
                                <td>{{ $sptPeneliti->nip }}</td>
                                <td>{{ $sptPeneliti->jabatan }}</td>
                                <td>{{ $sptPeneliti->tanggal_spt }}</td>
                                <td>{{ $sptPeneliti->anggota_peneliti }}</td>
                                <td>{{ $sptPeneliti->keterangan }}</td>
                                <td>
                                    <a href="{{ route('admin.spt_penelitis.show', $sptPeneliti->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.spt_penelitis.edit', $sptPeneliti->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.spt_penelitis.destroy', $sptPeneliti->id) }}" method="POST" class="d-inline">
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
        </div>
    </div>
</x-app-layout>