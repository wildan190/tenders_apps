<x-app-layout>
    <div class="container-fluid">

        <!-- Nomor Surat dan Header Surat -->
        <div class="mb-4">
            <p class="font-weight-bold">Nomor Surat: {{ $agendaRapat->id }}</p>
            <p class="font-weight-bold">Tanggal: {{ $agendaRapat->tanggal }}</p>
            <p class="font-weight-bold">Subject: {{ $agendaRapat->title }}</p>
        </div>

        <!-- Informasi Agenda dalam Tabel -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Waktu</td>
                            <td>{{ $agendaRapat->waktu }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tempat</td>
                            <td>{{ $agendaRapat->tempat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Deskripsi Agenda -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text">{{ $agendaRapat->deskripsi }}</p>
            </div>
        </div>
        <!-- Tombol Cetak ke PDF -->
        <div class="mt-4">
            <a href="{{ route('admin.agenda.print', $agendaRapat->id) }}" class="btn btn-primary">Cetak ke PDF</a>
        </div>
    </div>
</x-app-layout>