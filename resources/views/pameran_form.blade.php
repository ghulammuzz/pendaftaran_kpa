@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Pendaftaran Pameran</h2>
                    <h4>Contact person : 
                        <a href="https://api.whatsapp.com/send?phone=6281361652845" target="_blank">
                            <i class="fab fa-whatsapp"></i> 0813 6165 2845 a.n Achmad Zaki
                        </a>
                    </h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto text-sm form-sm">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pendaftaran.pameran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Nama Lengkap :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap" placeholder="Satriya" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi"><b>Nama Instansi/Lembaga :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_instansi"
                                name="nama_instansi" placeholder="Peunajoh" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><b>Alamat :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="alamat"
                                name="alamat" placeholder="Kota Jantho, Aceh Besar, Aceh" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><b>No. HP :</b></label>
                            <input type="tel" class="form-control form-control-alternative" id="no_hp"
                                name="no_hp" placeholder="080820242024" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_usaha"><b>Jenis Usaha :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="jenis_usaha"
                                name="jenis_usaha" placeholder="Fashion" required>
                        </div>
                        <div class="form-group">
                            <label for="ukuran_tenda"><b>Ukuran Tenda :</b></label>
                            <select class="form-control form-control-alternative" id="ukuran_tenda" name="ukuran_tenda" required>
                                <option>Ukuran 3x3 (Rp.000000)</option>
                                <option>Ukuran 3x4 (Rp.000000)</option>>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bukti_pembayaran"><b>Bukti Pembayaran :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="bukti_pembayaran"
                                name="bukti_pembayaran" placeholder="20-02-2024, 01230456, Indra" required>
                            <small>
                                <h5>* Diisi dengan aturan tanggal transfer, nomor rekening, nama pemilik rekening atau nama
                                    pihak yang mentransfer.</h5>
                            </small>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="pernyataan_1" value="0">
                            <!-- Tambahkan input tersembunyi untuk nilai default -->
                            <input type="checkbox" class="form-check-input" id="pernyataan_1" name="pernyataan_1"
                                value="1" required>
                            <label class="form-check-label" for="pernyataan">Saya bersedia mengikuti acara dan menanggung
                                biaya akomodasi dan transportasi</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="pernyataan_2" value="0">
                            <!-- Tambahkan input tersembunyi untuk nilai default -->
                            <input type="checkbox" class="form-check-input" id="pernyataan_2" name="pernyataan_2"
                                value="1" required>
                            <label class="form-check-label" for="pernyataan">Saya bersedia mengikuti seluruh kegiatan dan
                                mentaati persyaratn yang ditentukan oleh penyelenggara</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="pernyataan_3" value="0">
                            <!-- Tambahkan input tersembunyi untuk nilai default -->
                            <input type="checkbox" class="form-check-input" id="pernyataan_3" name="pernyataan_3"
                                value="1" required>
                            <label class="form-check-label" for="pernyataan">Saya wajib memberi tahu panitia jika terjadi
                                pembatalan kegiatan maksimal seminggu sebelum kegiatan dilaksanakan</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
