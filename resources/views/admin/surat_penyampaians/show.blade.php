<!-- resources/views/admin/surat_penyampaians/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Surat Penyampaian
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-light">
                        <h5 class="card-title text-primary">Surat Penyampaian Information</h5>
                        <hr class="my-4 bg-primary">

                        <dl class="row">
                            <div class="col-sm-6">
                                <dt>Kode Tender</dt>
                                <dd>{{ $kd_tender_value }}</dd>

                                <dt>Nomor Surat Penyampaian</dt>
                                <dd>{{ $suratPenyampian->nomor_surat_penyampaian }}</dd>

                                <dt>Tahun</dt>
                                <dd>{{ $suratPenyampian->tahun }}</dd>

                                <dt>Sifat</dt>
                                <dd>{{ $suratPenyampian->sifat }}</dd>

                                <dt>Destinasi Kepada</dt>
                                <dd>{{ $suratPenyampian->destinasi_kepada }}</dd>

                                <dt>Lampiran</dt>
                                <dd>{{ $suratPenyampian->lampiran }}</dd>
                            </div>

                            <div class="col-sm-6">
                                <dt>Perihal</dt>
                                <dd>{{ $suratPenyampian->perihal }}</dd>

                                <dt>Kepala Balai</dt>
                                <dd>{{ $suratPenyampian->kepala_balai }}</dd>

                                <dt>NIP</dt>
                                <dd>{{ $suratPenyampian->nip }}</dd>

                                <dt>Tanggal Surat</dt>
                                <dd>{{ $suratPenyampian->tanggal_surat }}</dd>

                                <dt>Tanggal Diterima</dt>
                                <dd>{{ $suratPenyampian->tanggal_diterima }}</dd>
                            </div>
                        </dl>

                        <!-- Additional Information -->
                        <hr class="my-4 bg-primary">
                        <h5 class="card-title text-primary">Tender Information</h5>

                        <dl class="row">
                            <div class="col-sm-4">
                                <dt>Nilai Kontrak</dt>
                                <dd>{{ $suratPenyampian->dataTender->nilai_kontrak }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Tanggal Kontrak</dt>
                                <dd>{{ $suratPenyampian->dataTender->tanggal_kontrak }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Nama Paket</dt>
                                <dd>{{ $suratPenyampian->dataTender->nama_paket }}</dd>
                            </div>
                        </dl>

                        <dl class="row">
                            <div class="col-sm-4">
                                <dt>Pagu</dt>
                                <dd>{{ $suratPenyampian->dataTender->pagu }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Satuan Kerja</dt>
                                <dd>{{ $suratPenyampian->dataTender->satuan_kerja }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back Button -->
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('admin.surat_penyampaians.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.surat_penyampaians.export_pdf', $suratPenyampian->id) }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export to PDF
                </a>
            </div>
        </div>
    </div>
</x-app-layout>