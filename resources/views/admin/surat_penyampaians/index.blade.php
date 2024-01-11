<!-- resources/views/admin/surat_penyampaians/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat Penyampaian</h1>
        <p class="text-gray-600 mb-4">Daftar Surat Penyampaian yang tersedia.</p>

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
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $suratPenyampaiain->id }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->nomor_surat_penyampaian }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->tahun }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->sifat }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->destinasi_kepada }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->lampiran }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->perihal }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->kepala_balai }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->nip }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->tanggal_surat }}</td>
                                <td class="px-6 py-4">{{ $suratPenyampaiain->tanggal_diterima }}</td>
                                <td class="px-6 py-4">
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