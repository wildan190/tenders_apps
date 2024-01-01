<!-- resources/views/admin/surat_penyampaians/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat Penyampaian</h1>
        <p class="mb-4">Daftar Surat Penyampaian yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                    <!-- Tombol Tambah Data dan Import -->
                    <div class="btn-group">
                        <a href="{{ route('admin.surat_penyampaians.create') }}" class="btn btn-primary">Tambah Data</a>

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
                                <th>ID</th>
                                <th>Nomor Surat Penyampaian</th>
                                <th>Tahun</th>
                                <th>Sifat</th>
                                <th>Destinasi Kepada</th>
                                <th>Lampiran</th>
                                <th>Perihal</th>
                                <th>Kepala Balai</th>
                                <th>NIP</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Diterima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratPenyampaians as $suratPenyampaiain)
                            <tr>
                                <td>{{ $suratPenyampaiain->id }}</td>
                                <td>{{ $suratPenyampaiain->nomor_surat_penyampaian }}</td>
                                <td>{{ $suratPenyampaiain->tahun }}</td>
                                <td>{{ $suratPenyampaiain->sifat }}</td>
                                <td>{{ $suratPenyampaiain->destinasi_kepada }}</td>
                                <td>{{ $suratPenyampaiain->lampiran }}</td>
                                <td>{{ $suratPenyampaiain->perihal }}</td>
                                <td>{{ $suratPenyampaiain->kepala_balai }}</td>
                                <td>{{ $suratPenyampaiain->nip }}</td>
                                <td>{{ $suratPenyampaiain->tanggal_surat }}</td>
                                <td>{{ $suratPenyampaiain->tanggal_diterima }}</td>
                                <td>
                                    <a href="{{ route('admin.surat_penyampaians.show', $suratPenyampaiain->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.surat_penyampaians.edit', $suratPenyampaiain->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.surat_penyampaians.destroy', $suratPenyampaiain->id) }}" method="POST" class="d-inline">
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