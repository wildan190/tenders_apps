<!-- resources/views/admin/data_surat_keputusan/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat Keputusan</h1>
        <p class="mb-4">Daftar data surat keputusan yang tersedia.</p>

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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Tender</th>
                                <th>Nomor SK</th>
                                <th>Nomor Surat</th>
                                <th>Tahun</th>
                                <th>Tanggal Terbit</th>
                                <th>Pembuat Komitmen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataSuratKeputusan as $suratKeputusan)
                            <tr>
                                <td>{{ $suratKeputusan->kd_tender }}</td>
                                <td>{{ $suratKeputusan->nomor_sk }}</td>
                                <td>{{ $suratKeputusan->nomor_surat }}</td>
                                <td>{{ $suratKeputusan->tahun }}</td>
                                <td>{{ $suratKeputusan->tanggal_terbit }}</td>
                                <td>{{ $suratKeputusan->pembuat_komitmen }}</td>
                                <td>
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
