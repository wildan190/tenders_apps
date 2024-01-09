<!-- resources/views/admin/cek_data_tenders/index.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cek Data Tender</h1>
        <p class="mb-4">Daftar cek data tender yang telah dicek.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">

                        <form action="{{ route('admin.cek_data_tenders.updateStatusAll') }}" method="POST">
                            @csrf
                            <button type="submit" class=" btn btn-warning" style="background-color: orange; border-color: orange; color: white;" id="updateStatusBtn"><i class="fas fa-sync-alt"></i>
                                Sinkronkan Status
                            </button>
                        </form>

                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.cek_data_tenders.create') }}">Tambah Data</a>
                            <a class="dropdown-item" href="{{ route('admin.cek_data_tenders.create') }}">Tambah Manual</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Personil</th>
                                <th>Nama Paket</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekDataTenders as $cekDataTender)
                            <tr>
                                <td>{{ $cekDataTender->cekPersonil->nama_personil }}</td>
                                <td>{{ $cekDataTender->dataTender->nama_paket }}</td>
                                <td>
                                    @if($cekDataTender->status == 'DITETAPKAN')
                                    <span class="badge badge-primary">{{ $cekDataTender->status }}</span>
                                    @elseif($cekDataTender->status == 'DIKERJAKAN')
                                    <span class="badge badge-warning">{{ $cekDataTender->status }}</span>
                                    @elseif($cekDataTender->status == 'SELESAI')
                                    <span class="badge badge-success">{{ $cekDataTender->status }}</span>
                                    @else
                                    {{ $cekDataTender->status }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.cek_data_tenders.show', $cekDataTender->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.cek_data_tenders.edit', $cekDataTender->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.cek_data_tenders.destroy', $cekDataTender->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                    <!-- Tambahkan tombol-tombol lain sesuai kebutuhan -->
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

            // Add event listener for the update status button
            $('#updateStatusBtn').on('click', function() {
                // Make sure to use the CSRF token in your AJAX request
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.cek_data_tenders.updateStatusAll") }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // Reload the page or perform any other action on success
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>
    @endpush

</x-app-layout>