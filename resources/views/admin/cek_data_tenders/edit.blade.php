<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Cek Data Tender</h1>
        <p class="mb-4">Edit formulir di bawah ini untuk mengubah data cek data tender.</p>

        <!-- Form untuk Edit Cek Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cek_data_tenders.update', $cekDataTender->id) }}">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">

                        <!-- Nama Personil -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cek_personil_id">Nama Personil:</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cek_personil_id" name="cek_personil_id" required>
                                @foreach($cekPersonils as $cekPersonil)
                                <option value="{{ $cekPersonil->id }}" @if($cekPersonil->id == $cekDataTender->cek_personil_id) selected @endif>{{ $cekPersonil->nama_personil }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Data Tender -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="data_tender_id">Data Tender:</label>
                            <div class="input-group">
                                <input type="text" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 custom-select" id="selected_data_tender" value="{{ $cekDataTender->dataTender->kd_tender }} - {{ $cekDataTender->dataTender->nama_paket }}" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataTenderModal">Pilih</button>
                                </div>
                            </div>
                            <input type="hidden" id="data_tender_id" name="data_tender_id" value="{{ $cekDataTender->data_tender_id }}" required>
                        </div>

                        <div class="modal fade" id="dataTenderModal" tabindex="-1" role="dialog" aria-labelledby="dataTenderModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dataTenderModalLabel">Pilih Data Tender</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" class="modal-body" style="max-height: 700px; overflow-y: auto;">
                                        <!-- Tabel Data Tender -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kode Tender</th>
                                                    <th>Nama Paket</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dataTenders as $dataTender)
                                                <tr>
                                                    <td>{{ $dataTender->kd_tender }}</td>
                                                    <td>{{ $dataTender->nama_paket }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" onclick="selectDataTender('{{ $dataTender->id }}', '{{ $dataTender->kd_tender }} - {{ $dataTender->nama_paket }}')"><i class="fas fa-check-circle"></i> Pilih</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-gray active:bg-gray-800" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.cek_data_tenders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk mengatur data tender yang dipilih
        function selectDataTender(dataTenderId, dataTenderText) {
            document.getElementById('data_tender_id').value = dataTenderId;
            document.getElementById('selected_data_tender').value = dataTenderText;
            $('#dataTenderModal').modal('hide');
        }
    </script>
</x-app-layout>