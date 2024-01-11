<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cek Personil</h1>
        <p class="mb-4">Daftar personil yang telah dicek.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                        <a href="{{ route('admin.cek_personils.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.cek_personils.create') }}">Tambah Manual</a>
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
                                    Jabatan Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NPWP Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telepon Personil
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekPersonils as $cekPersonil)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    {{ $cekPersonil->nama_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->jabatan_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->nik_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->npwp_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->email_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cekPersonil->telepon_personil }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.cek_personils.show', $cekPersonil->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.cek_personils.edit', $cekPersonil->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.cek_personils.destroy', $cekPersonil->id) }}" method="POST" style="display: inline;">
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
            <div class="card-footer">
                {{ $cekPersonils->links() }}
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
