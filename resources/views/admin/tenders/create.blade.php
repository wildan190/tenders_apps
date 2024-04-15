<x-app-layout>
    <div class="container mx-auto mt-4 p-4">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Data Tender</h1>

        <div class="card shadow">
            <div class="card-body">
                <!-- Form untuk Tambah Tender -->
                <form action="{{ route('admin.tenders.store') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Hidden Input untuk data_tender_id -->
                    <input type="hidden" id="dataTenderId" name="dataTenderId">

                    <!-- Pemilihan Kode Tender dengan Modal -->
                    <div class="mb-3">
                        <label for="kodeTender" class="form-label">Pilih Kode Tender</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kodeTender" name="kodeTender" readonly placeholder="Contoh: https://www.gdrive.com/">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kodeTenderModal">
                                Pilih Kode Tender
                            </button>
                        </div>
                    </div>

                    <!-- Input untuk Tahun -->
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" required placeholder="Contoh: 2024">
                    </div>

                    <!-- Input untuk Nama Paket -->
                    <div class="mb-3">
                        <label for="namaPaket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="namaPaket" name="namaPaket" required placeholder="Contoh: Nama Paket Tender">
                    </div>

                    <!-- Input untuk Catatan Tim Pelaksana -->
                    <div class="mb-3">
                        <label for="catatanTimPelaksana" class="form-label">Catatan Tim Pelaksana</label>
                        <textarea class="form-control" id="catatanTimPelaksana" name="catatanTimPelaksana" placeholder="Contoh: https://www.gdrive.com/"></textarea>
                    </div>

                    <!-- Input untuk Usulan -->
                    <div class="mb-3">
                        <label for="usulan" class="form-label">Usulan</label>
                        <input type="text" class="form-control" id="usulan" name="usulan" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk dataPpk -->
                    <div class="mb-3">
                        <label for="dataPpk" class="form-label">Data PPk</label>
                        <input type="text" class="form-control" id="dataPpk" name="dataPpk" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk dataPokja -->
                    <div class="mb-3">
                        <label for="dataPokja" class="form-label">Data Pokja</label>
                        <input type="text" class="form-control" id="dataPokja" name="dataPokja" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk penawaranPeserta -->
                    <div class="mb-3">
                        <label for="penawaranPeserta" class="form-label">Penawaran Peserta</label>
                        <input type="text" class="form-control" id="penawaranPeserta" name="penawaranPeserta" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk penawaranPesertaApendo -->
                    <div class="mb-3">
                        <label for="penawaranPesertaApendo" class="form-label">Penawaran Peserta Apendo</label>
                        <input type="text" class="form-control" id="penawaranPesertaApendo" name="penawaranPesertaApendo" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk beritaAcara -->
                    <div class="mb-3">
                        <label for="beritaAcara" class="form-label">Berita Acara</label>
                        <input type="text" class="form-control" id="beritaAcara" name="beritaAcara" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Input untuk sppbj -->
                    <div class="mb-3">
                        <label for="sppbj" class="form-label">SPPBJ</label>
                        <input type="text" class="form-control" id="sppbj" name="sppbj" placeholder="Contoh: https://www.gdrive.com/">
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>

    <!-- Modal untuk Pemilihan Kode Tender -->
    <div class="modal fade" id="kodeTenderModal" tabindex="-1" role="dialog" aria-labelledby="kodeTenderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kodeTenderModalLabel">Pilih Kode Tender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tabel untuk List Kode Tender -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Tender</th>
                                <th>Nama Paket</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kodeTenders as $kodeTender)
                            <tr>
                                <td>{{ $kodeTender->kd_tender }}</td>
                                <td>{{ $kodeTender->nama_paket }}</td>
                                <td>{{ $kodeTender->tahun }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="selectKodeTender('{{ $kodeTender->kd_tender }}', '{{ $kodeTender->nama_paket }}', '{{ $kodeTender->tahun }}', '{{ $kodeTender->data_tender_id }}')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memilih Kode Tender
        function selectKodeTender(kodeTender, namaPaket, tahun, dataTenderId) {
            document.getElementById('kodeTender').value = kodeTender;
            document.getElementById('namaPaket').value = namaPaket;
            document.getElementById('tahun').value = tahun;
            document.getElementById('dataTenderId').value = dataTenderId;
            $('#kodeTenderModal').modal('hide'); // Sembunyikan modal setelah dipilih
        }
    </script>
</x-app-layout>
