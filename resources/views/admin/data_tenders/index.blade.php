<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Tender</h1>
        <p class="text-gray-600 mb-4">Daftar data tender yang tersedia.</p>

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
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Kode Tender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Paket
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kode Pokja
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pagu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    HPS
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Satuan Kerja
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    PPK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Instansi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai Penawaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Penetapan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai Kontrak
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Kontrak
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Waktu Pelaksanaan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tahun
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTenders as $dataTender)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    <a href="{{ $dataTender->link_web }}" target="_blank">{{ $dataTender->kd_tender }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->nama_paket }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->kode_pokja }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->pagu }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->hps }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->satuan_kerja }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->ppk }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->nama_instansi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->nilai_penawaran }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->tanggal_penetapan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->nilai_kontrak }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->tanggal_kontrak }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->waktu_pelaksanaan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dataTender->tahun }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.data_tenders.show', $dataTender->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.data_tenders.edit', $dataTender->id) }}" class="btn btn-warning btn-sm">
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
            <div class="card-footer">
                {{ $dataTenders->links() }}
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
