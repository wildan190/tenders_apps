<!-- resources/views/admin/data_tenders/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Tender</h1>
        <p class="mb-4">Daftar data tender yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                    <a href="{{ route('admin.data_tenders.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.data_tenders.create') }}">Tambah Manual</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Tender</th>
                                <th>Nama Paket</th>
                                <th>Kode Pokja</th>
                                <th>Pagu</th>
                                <th>HPS</th>
                                <th>Satuan Kerja</th>
                                <th>PPK</th>
                                <th>Nama Instansi</th>
                                <th>Nilai Penawaran</th>
                                <th>Tanggal Penetapan</th>
                                <th>Nilai Kontrak</th>
                                <th>Tanggal Kontrak</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTenders as $dataTender)
                            <tr>
                                <td><a href="{{ $dataTender->link_web }}" target="_blank">{{ $dataTender->kd_tender }}</a></td>
                                <td>{{ $dataTender->nama_paket }}</td>
                                <td>{{ $dataTender->kode_pokja }}</td>
                                <td>{{ $dataTender->pagu }}</td>
                                <td>{{ $dataTender->hps }}</td>
                                <td>{{ $dataTender->satuan_kerja }}</td>
                                <td>{{ $dataTender->ppk }}</td>
                                <td>{{ $dataTender->nama_instansi }}</td>
                                <td>{{ $dataTender->nilai_penawaran }}</td>
                                <td>{{ $dataTender->tanggal_penetapan }}</td>
                                <td>{{ $dataTender->nilai_kontrak }}</td>
                                <td>{{ $dataTender->tanggal_kontrak }}</td>
                                <td>{{ $dataTender->waktu_pelaksanaan }}</td>
                                <td>
                                    <a href="{{ route('admin.data_tenders.show', $dataTender->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.data_tenders.edit', $dataTender->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.data_tenders.destroy', $dataTender->id) }}" method="POST" style="display: inline;">
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