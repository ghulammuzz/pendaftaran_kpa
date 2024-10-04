@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Pendaftaran Kongres</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto text-sm form-sm">
                    @if (session('success') || session('error'))
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                @if (session('success'))
                                    <div class="alert alert-success d-flex justify-content-between">
                                        {{ session('success') }}
                                        {{-- @if (session('success'))
                                            @php
                                                $kongresId = session('kongres_id');
                                            @endphp
                                            <a href="{{ route('cetak.bukti', ['kongres' => $kongresId]) }}"
                                                class="btn btn-sm btn-neutral" style="border-radius: 50px">
                                                <i class="fa fa-print mr-2"></i>Cetak Bukti Pendaftaran
                                            </a>
                                        @endif --}}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endif
                    <form action="{{ route('pendaftaran.kongres.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Nama Lengkap:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap" required>
                                <small><em>Masukkan nama lengkap dengan gelar Anda jika ada.</em></small>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas"><b>NIK:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="no_identitas"
                                name="no_identitas" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi"><b>Nama Instansi/Lembaga:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_instansi"
                                name="nama_instansi" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><b>Alamat:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="alamat"
                                name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><b>No. HP:</b></label>
                            <input type="tel" class="form-control form-control-alternative" id="no_hp"
                                name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="penginapan"><b>Rencana Menginap:</b></label>
                            <select class="form-control form-control-alternative" id="penginapan" name="penginapan">
                                <option>Menginap</option>
                                <option>Tidak Menginap</option>
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="pernyataan" value="0">
                            <!-- Tambahkan input tersembunyi untuk nilai default -->
                            <input type="checkbox" class="form-check-input" id="pernyataan" name="pernyataan" value="1"
                                required>
                            <label class="form-check-label" for="pernyataan">Saya bersedia mengikuti acara dan menanggung
                                biaya akomodasi dan transportasi</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
