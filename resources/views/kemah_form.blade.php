@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Pendaftaran Kemah Seniman dan Budayawan</h2>
                    <h4>Contact person : 
                        <a href="https://api.whatsapp.com/send?phone=6285260167617" target="_blank">
                            <i class="fab fa-whatsapp"></i> 0852 6016 7617 a.n Aris Munandar
                        </a>
                    </h4>
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
                    <form action="{{ route('pendaftaran.kemah.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Nama Lengkap:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap" placeholder="satriya" required>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas"><b>NIK:</b></label>
                            <input type="number" class="form-control form-control-alternative" id="no_identitas"
                                name="no_identitas" placeholder="Input NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><b>Alamat:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="alamat"
                                name="alamat" placeholder="Kota Jantho, Aceh Besar, Aceh" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan"><b>Pekerjaan:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="pekerjaan"
                                name="pekerjaan" placeholder="Dosen" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Email:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="email"
                                name="email" placeholder="sat@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><b>No. HP:</b></label>
                            <input type="number" class="form-control form-control-alternative" id="no_hp"
                                name="no_hp" placeholder="080808908080" required>
                        </div>
                        <div class="form-group">
                            <label for="bidang"><b>Seniman dan Budayawan Bidang:</b></label>
                            <input type="text" class="form-control form-control-alternative" id="bidang"
                                name="bidang" placeholder="Sastra" required>
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
