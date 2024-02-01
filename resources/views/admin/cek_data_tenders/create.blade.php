<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Cek Data Tender</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan cek data tender baru.</p>

        <!-- Form untuk Tambah Cek Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_data_tenders.store') }}">
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

                    <!-- Multiple Entries -->
                    <div id="multiple-entries">
                        <!-- Each entry will be added dynamically here -->
                    </div>

                    <!-- Add Entry Button -->
                    <button type="button" class="btn btn-success" onclick="addEntry()">Tambah Entry</button>

                    <!-- Data Tender Modal -->
                    <div class="modal fade" id="dataTenderModal" tabindex="-1" role="dialog" aria-labelledby="dataTenderModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dataTenderModalLabel">Pilih Data Tender</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="max-height: 700px; overflow-y: auto;">
                                    <!-- Tabel Data Tender -->
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
                                            @foreach($dataTenders as $dataTender)
                                            <tr>
                                                <td>{{ $dataTender->kd_tender }}</td>
                                                <td>{{ $dataTender->nama_paket }}</td>
                                                <td>{{ $dataTender->tahun }}</td>
                                                <td>
                                                    <!-- Use setEntryIndex to set the correct entry index when selecting a data tender -->
                                                    <button type="button" class="btn btn-primary" onclick="selectDataTender('{{ $dataTender->id }}', '{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}', currentEntryIndex)">
                                                        <i class="fas fa-check-circle"></i> Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <a href="{{ route('admin.cek_data_tenders.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Your existing script for modal selection -->
    <script>
        // Variable to store the current entry index
        var currentEntryIndex;

        // Fungsi untuk mengatur data tender yang dipilih
        function selectDataTender(dataTenderId, dataTenderText, entryIndex) {
            document.getElementById('data_tender_id_' + entryIndex).value = dataTenderId;
            document.getElementById('selected_data_tender_' + entryIndex).value = dataTenderText;
            $('#dataTenderModal').modal('hide');
        }

        // Fungsi untuk mengatur indeks entri saat membuka modal
        function setEntryIndex(entryIndex) {
            currentEntryIndex = entryIndex;
        }

        // Add Entry Function
        function addEntry() {
            var entryIndex = document.querySelectorAll('.entry').length + 1;

            var entryDiv = document.createElement('div');
            entryDiv.className = 'row mt-4 entry';

            // Copy the template and replace the index in the names
            entryDiv.innerHTML = document.getElementById('entry-template').innerHTML.replace(/INDEX/g, entryIndex);

            document.getElementById('multiple-entries').appendChild(entryDiv);
        }

        // Remove Entry Function
        function removeEntry(button) {
            var entryDiv = button.closest('.entry');
            entryDiv.remove();
        }
    </script>
</x-app-layout>

<!-- Entry Template (hidden) -->
<script id="entry-template" type="text/template">
    <div class="form-group col-md-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama_personil">Nama Personil:</label>
        <select class="form-control" name="cek_personil_id[]" required>
            @foreach($cekPersonils as $cekPersonil)
            <option value="{{ $cekPersonil->id }}">{{ $cekPersonil->nama_personil }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="data_tender_id">Data Tender:</label>
        <div class="input-group">
            <input type="text" class="form-control border border-gray-300 rounded-lg bg-white focus:border-blue-500" id="selected_data_tender_INDEX" readonly>
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataTenderModal" onclick="setEntryIndex(INDEX)">Pilih</button>
            </div>
            <button type="button" class="btn btn-danger" onclick="removeEntry(this)">Hapus</button>
        </div>
        <input type="hidden" id="data_tender_id_INDEX" name="data_tender_id[]" required>
    </div>
</script>
