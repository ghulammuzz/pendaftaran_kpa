@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Pendaftaran Pertunjukan Seni Budaya</h2>
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
                    <form action="{{ route('pendaftaran.pertunjukan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Nama Penanggung Jawab :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap" placeholder="Satriya" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi"><b>Nama Komunitas/Sanggar :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_instansi"
                                name="nama_instansi" placeholder="Sanggar Tari Aceh" required>
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
                            <label for="jenis_pertunjukan"><b>Jenis Pertunjukan :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="jenis_pertunjukan"
                                name="jenis_pertunjukan" placeholder="Menari" required>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis"><b>Sinopsis Pertunjukan :</b></label>
                            <textarea type="text-area" class="form-control form-control-alternative" id="sinopsis" name="sinopsis" rows="5"
                                placeholder="Ketik atau copy + paste disini..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_peserta"><b>Jumlah Peserta :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="jumlah_peserta" name="jumlah_peserta"
                                placeholder="5 Orang" required></input>
                        </div>
                        <div class="form-group">
                            <label for="kebutuhan"><b>Kebutuhan Pertunjukan :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="kebutuhan" name="kebutuhan"
                                placeholder="Microphone 2, Kursi 3, dan lainya ..." required></input>
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
                                mentaati persyaratan yang ditentukan oleh penyelenggara</label>
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
