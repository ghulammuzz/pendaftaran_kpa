@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Pendaftaran Workshop</h2>
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
                    <form action="{{ route('pendaftaran.workshop.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Nama Lengkap:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap" placeholder="Satriya, S.Kom" required>
                                <small><h5>Masukkan nama lengkap dengan gelar Anda jika ada.</h5></small>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas"><b>NISN/NIK:</b></label>
                            <input type="number" class="form-control form-control-alternative" id="no_identitas"
                                name="no_identitas" placeholder="11111111111111" required>
                        </div>
                        <div class="form-group">
                            <label for="npsn"><b>NPSN :</b></label>
                            <input type="number" class="form-control form-control-alternative" id="npsn"
                                name="npsn" placeholder="1010101010" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi"><b>Asal Sekolah/Instansi:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_instansi"
                                name="nama_instansi" placeholder="SMAN 1 Kota Jantho" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><b>No. HP:</b></label>
                            <input type="tel" class="form-control form-control-alternative" id="no_hp"
                                name="no_hp" placeholder="080820242024" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_acara"><b>Pilih Workshop :</b></label>
                            <select class="form-control form-control-alternative" id="jenis_acara" name="jenis_acara">
                                <option>Workshop Cipta Cerpen - Program Studi Kajian Sastra dan Budaya</option>
                                <option>Workshop Batik - Program Studi Seni Kriya</option>
                                <option>Workshop Teater Tradisi - Program Studi Seni Teater</option>
                                <option>Workshop Desain Interior - Program Studi Desain Interior</option>
                                <option>Workshop Make Up - Program Studi Seni Tari</option>
                                <option>Workshop Ilustrasi Kreatif - Program Studi Desain Komunikasi Visual</option>
                                <option>Workshop Pidato Bahasa Aceh - Program Studi Bahasa Aceh</option>
                                <option>Workshop Musik Tradisi - Program Studi Karawitan</option>
                                <option>Workshop Seni Rupa Tradisional dan Kontemporer - Proggram Studi Seni Rupa Murni</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status"><b>Pilih Status:</b></label>
                            <select class="form-control form-control-alternative" id="status" name="status">
                                <option>Siswa</option>
                                <option>Guru</option>
                                <option>Mahasiswa</option>
                                <option>Dosen</option>
                                <option>Lainnya</option>
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
