<x-app-layout>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Surat Keputusan</h1>

        <!-- Split Button for Adding Data -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Surat Keputusan</h6>
                    <!-- Split Button for Adding Data -->
                    <div class="btn-group">
                        <a href="{{ route('admin.data_surat_keputusans.create') }}" class="btn btn-primary">Tambah Data</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <a class="dropdown-item" href="{{ route('admin.data_surat_keputusans.create') }}">Tambah Manual</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <!-- Table Header -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pokja</th>
                                <th>Nomor SK</th>
                                <th>Tahun</th>
                                <th>Nama Pembuat Komitmen</th>
                                <th>Nomor Surat</th>
                                <th>Satuan Kerja</th>
                                <th>Tanggal Terbit</th>
                                <th>Nama Personil</th>
                                <th>NIP Personil</th>
                                <th>Nama Paket</th>
                                <th>Pagu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSuratKeputusans as $key => $dataSuratKeputusan)
                            <tr>
                                <td>{{ $dataSuratKeputusans->firstItem() + $key }}</td>
                                <td>{{ $dataSuratKeputusan->kode_pokja }}</td>
                                <td>{{ $dataSuratKeputusan->nomor_sk }}</td>
                                <td>{{ $dataSuratKeputusan->tahun }}</td>
                                <td>{{ $dataSuratKeputusan->nama_pembuat_komitmen }}</td>
                                <td>{{ $dataSuratKeputusan->nomor_surat }}</td>
                                <td>{{ $dataSuratKeputusan->satuan_kerja }}</td>
                                <td>{{ $dataSuratKeputusan->tanggal_terbit }}</td>
                                <td>{{ $dataSuratKeputusan->nama_personil }}</td>
                                <td>{{ $dataSuratKeputusan->nip_personil }}</td>
                                <td>{{ $dataSuratKeputusan->nama_paket }}</td>
                                <td>{{ $dataSuratKeputusan->pagu }}</td>
                                <td>
                                    <!-- Add your action buttons here, for example, view, edit, delete -->
                                    <a href="{{ route('admin.data_surat_keputusans.show', $dataSuratKeputusan->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.data_surat_keputusans.edit', $dataSuratKeputusan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.data_surat_keputusans.destroy', $dataSuratKeputusan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $dataSuratKeputusans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>