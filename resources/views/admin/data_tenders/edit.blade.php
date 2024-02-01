<!-- resources/views/admin/data_tenders/edit.blade.php -->

<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Tender</h1>
        <p class="mb-4">Edit formulir di bawah ini untuk mengubah data tender.</p>

        <!-- Form untuk Edit Data Tender -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.data_tenders.update', $dataTender->id) }}">
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

                        <!-- Kode Tender -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="kd_tender">Kode Tender:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="kd_tender" name="kd_tender" value="{{ $dataTender->kd_tender }}" required>
                        </div>

                        <!-- Nama Paket -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama_paket">Nama Paket:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama_paket" name="nama_paket" value="{{ $dataTender->nama_paket }}" required>
                        </div>

                    </div>

                    <div class="row">

                        <!-- Link Web -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="link_web">Link Web:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="link_web" name="link_web" value="{{ $dataTender->link_web }}">
                        </div>

                        <!-- Kode Pokja.php -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="kode_pokja">Kode Pokja:</label>
                            <div class="input-group">
                                <input type="text" value="{{ $dataTender->kode_pokja }}" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 custom-select" id="selected_kode_pokja" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kodePokjaModal">
                                        <i class="fas fa-list"></i> Pilih
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" id="kode_pokja" value="{{ $dataTender->kode_pokja }}" name="kode_pokja" required>
                        </div>

                    </div>

                    <div class="row">

                        <!-- Pagu -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="pagu">Pagu:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="pagu" name="pagu" value="{{ $dataTender->pagu }}" required>
                        </div>

                        <!-- HPS -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="hps">HPS:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hps" name="hps" value="{{ $dataTender->hps }}" required>
                        </div>

                        <!-- Satuan Kerja -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="satuan_kerja">Satuan Kerja:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="satuan_kerja" name="satuan_kerja" value="{{ $dataTender->satuan_kerja }}" required>
                        </div>

                        <!-- PPK -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="ppk">PPK:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="ppk" name="ppk" value="{{ $dataTender->ppk }}" required>
                        </div>

                        <!-- Nama Instansi -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama_instansi">Nama Instansi:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama_instansi" name="nama_instansi" value="{{ $dataTender->nama_instansi }}" required>
                        </div>

                        <!-- Nilai Penawaran -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nilai_penawaran">Nilai Penawaran:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nilai_penawaran" name="nilai_penawaran" value="{{ $dataTender->nilai_penawaran }}" required>
                        </div>

                        <!-- Tanggal Penetapan -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tanggal_penetapan">Tanggal Penetapan:</label>
                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal_penetapan" name="tanggal_penetapan" value="{{ $dataTender->tanggal_penetapan }}" required>
                        </div>

                        <!-- Nilai Kontrak -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nilai_kontrak">Nilai Kontrak:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nilai_kontrak" name="nilai_kontrak" value="{{ $dataTender->nilai_kontrak }}">
                        </div>

                        <!-- Tanggal Kontrak -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tanggal_kontrak">Tanggal Kontrak:</label>
                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tanggal_kontrak" name="tanggal_kontrak" value="{{ $dataTender->tanggal_kontrak }}">
                        </div>

                        <!-- tahun -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tahun">Tahun:</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tahun" name="tahun" value="{{ $dataTender->tahun }}">
                        </div>

                        <!-- Waktu Pelaksanaan -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="Ekspektasi Selesai">Ekspektasi Selesai:</label>
                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="{{ $dataTender->waktu_pelaksanaan }}">
                        </div>

                        <!-- Pilih Pokja -->
                        <div class="form-group col-md-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="pokja_id">Pilih Pokja:</label>
                            <div class="input-group">
                                <select class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 custom-select" id="pokja_id" name="pokja_id[]" multiple>
                                    @foreach($pokjas as $pokja)
                                    <option value="{{ $pokja->id }}" selected>{{ $pokja->nama }} - {{ $pokja->jabatan }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectPokjaModal">Pilih</button>
                                </div>
                            </div>
                        </div>


                        <!-- Modal untuk memilih pokja -->
                        <div class="modal fade" id="selectPokjaModal" tabindex="-1" role="dialog" aria-labelledby="selectPokjaModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="selectPokjaModalLabel">Pilih Pokja</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Table to display Pokja data -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pokjas as $pokja)
                                                <tr>
                                                    <td>{{ $pokja->nama }}</td>
                                                    <td>{{ $pokja->jabatan }}</td>
                                                    <td>
                                                        <div class="flex justify-between">
                                                            <button type="button" class="btn btn-primary btn-sm" onclick="selectPokja({{ $pokja->id }}, '{{ $pokja->nama }} - {{ $pokja->jabatan }}')">
                                                                <i class="fas fa-check-circle"></i> Pilih
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="removePokja({{ $pokja->id }})" style="color: #fff; background-color: #dc3545; border-color: #dc3545;">
                                                                <i class="fas fa-trash-alt"></i> Hapus
                                                            </button>
                                                        </div>
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

                        <!-- Modal Kode Pokja-->
                        <div class="modal fade" id="kodePokjaModal" tabindex="-1" role="dialog" aria-labelledby="kodePokjaModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="kodePokjaModalLabel">Pilih Kode Pokja</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Table to display Kode Pokja data -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pokja</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kodePokjas as $kodePokja)
                                                <tr>
                                                    <td>{{ $kodePokja->kode_pokja }}</td>
                                                    <td>{{ $kodePokja->keterangan }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" onclick="selectKodePokja({{ $kodePokja->id }},'{{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}')">
                                                            <i class="fas fa-check-circle"></i> Pilih
                                                        </button>
                                                        <!---<button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-red active:bg-red-800" onclick="removeKodePokja('{{ $kodePokja->kode_pokja }} - {{ $kodePokja->keterangan }}')">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>-->
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

                    <!-- Tombol Update -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.data_tenders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                            Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        function selectPokja(id, displayText) {
            // Add selected Pokja to the multiple select box
            $('#pokja_id').append('<option value="' + id + '">' + displayText + '</option>');

            // Set the selected option as 'selected'
            $('#pokja_id option[value="' + id + '"]').prop('selected', true);

            // Close the modal
            $('#selectPokjaModal').modal('hide');
        }

        function removePokja(id) {
            // Remove the selected Pokja from the multiple select box
            $('#pokja_id option[value="' + id + '"]').remove();
        }

        function selectKodePokja(displayText) {
            var selectedKodePokja = displayText;
            $('#selected_kode_pokja').val(selectedKodePokja);
            $('#kode_pokja').val(selectedKodePokja);
            $('#kodePokjaModal').modal('hide');
        }

        function removeKodePokja(displayText) {
            var removedKodePokja = displayText;
            $('#selected_kode_pokja').val('');
            $('#kode_pokja').val('');
            $('#kodePokjaModal').modal('hide');
        }
    </script>
</x-app-layout>