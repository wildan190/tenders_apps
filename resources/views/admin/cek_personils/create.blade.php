<x-app-layout>
    <div class="container mx-auto p-4 overflow-x-auto">
        <!-- Page Heading -->
        <h1 class="text-2xl font-semibold mb-2 text-gray-800">Tambah Data Cek Personil</h1>
        <p class="mb-4">Isi formulir di bawah ini untuk menambahkan data cek personil.</p>

        <!-- Form untuk Tambah Data -->
        <div class="bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('admin.cek_personils.store') }}" id="dynamic-form">
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

                <!-- Dynamic Input Fields -->
                <div id="dynamic-fields-container">
                    <!-- Table Header -->
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>Nama Personil</th>
                                <th>Jabatan Personil</th>
                                <th>NIK Personil</th>
                                <th>NPWP Personil</th>
                                <th>Email Personil</th>
                                <th>Telepon Personil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Initial Input Fields -->
                            <tr>
                                <td>
                                    <input type="text" name="nama_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Nama Personil" required>
                                </td>
                                <td>
                                    <input type="text" name="jabatan_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Jabatan Personil" required>
                                </td>
                                <td>
                                    <input type="text" name="nik_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="NIK Personil" required>
                                </td>
                                <td>
                                    <input type="text" name="npwp_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="NPWP Personil" required>
                                </td>
                                <td>
                                    <input type="email" name="email_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Email Personil" required>
                                </td>
                                <td>
                                    <input type="text" name="telepon_personil[]" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Telepon Personil" required>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger" onclick="removeInputFields(this)">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Add More Button -->
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="addInputFields()">Tambah Baris</button>

                <!-- Submit Button -->
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Simpan</button>
                <a href="{{ route('admin.cek_personils.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                    Batal
                </a>
            </form>
        </div>
    </div>

    <script>
        var rowCounter = 1;

        function addInputFields() {
            var container = document.getElementById('dynamic-fields-container').getElementsByTagName('tbody')[0];
            var newRow = container.insertRow();

            var cells = [];
            for (var i = 0; i < 7; i++) {
                cells[i] = newRow.insertCell(i);
            }

            cells[0].innerHTML = '<input type="text" name="nama_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Nama Personil">';
            cells[1].innerHTML = '<input type="text" name="jabatan_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Jabatan Personil">';
            cells[2].innerHTML = '<input type="text" name="nik_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="NIK Personil">';
            cells[3].innerHTML = '<input type="text" name="npwp_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="NPWP Personil">';
            cells[4].innerHTML = '<input type="text" name="email_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Email Personil">';
            cells[5].innerHTML = '<input type="text" name="telepon_personil[]_' + rowCounter + '" class="rounded mt-1 p-2 w-full border rounded-md" placeholder="Telepon Personil">';
            cells[6].innerHTML = '<a href="javascript:void(0);" class="btn btn-danger" onclick="removeInputFields(this)"><i class="fas fa-trash"></i> Hapus</a>';


            rowCounter++;
        }

        function removeInputFields(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

</x-app-layout>