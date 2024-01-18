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
                            <button type="submit" class="btn btn-warning" style="background-color: orange; border-color: orange; color: white;" id="updateStatusBtn">
                                <i class="fas fa-sync-alt"></i> Sinkronkan Status
                            </button>
                        </form>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.cek_data_tenders.create') }}">Tambah Manual</a>
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
                                    Nama Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NPWP Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Paket
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instansi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekDataTenders as $cekDataTender)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $cekDataTender->cekPersonil->nama_personil }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $cekDataTender->cekPersonil->nik_personil }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $cekDataTender->cekPersonil->npwp_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekDataTender->dataTender->nama_paket }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekDataTender->dataTender->nama_instansi }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($cekDataTender->status == 'DITETAPKAN')
                                    <span class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"><span class="w-2 h-2 me-1 bg-blue-500 rounded-full"></span>{{ $cekDataTender->status }}</span>
                                    @elseif($cekDataTender->status == 'DIKERJAKAN')
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300"><span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>{{ $cekDataTender->status }}</span>
                                    @elseif($cekDataTender->status == 'SELESAI')
                                    <span class="inline-flex items-center bg-green-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"><span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>{{ $cekDataTender->status }}</span>
                                    @else
                                    {{ $cekDataTender->status }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
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
            <div class="card-footer">
                {{ $cekDataTenders->links() }}
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