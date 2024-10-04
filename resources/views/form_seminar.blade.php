@extends('layouts.app')

@section('content')

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">About us International Conference</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: justify">
                    <!-- Your welcome message or content goes here -->
                    <h5>Overview</h5>
                    <p style="font-size: 14px;">This International Conference event is held on the first day of the Aceh
                        Civilization Congress series, which will take place on May 6, 2024. This event will be conducted as
                        the opening of the main activities series, namely the 2nd Aceh Civilization Congress, but this
                        International Congress is the first activity, which will be held continuously every two years. This
                        year's International Congress theme is <b>“The Empowerment of Acehnese Arts and Culture in Building
                            Future Civilization”</b>, which covers discussions on Arts, Culture, Sociology, Politics,
                        Literature, History, Linguistics, Social Economy, Anthropology, Ethnomusicology, and Laws. This
                        theme is certainly in line with the main theme of the Aceh civilization congress.</p>

                    <h5 class="mt-2">Speakers</h5>
                    <p style="font-size: 14px;">Keynote Speaker:
                        <br><b>Hilmar Farid, M.A., Ph.D.</b> - Directorate General of Culture, Ministry of Education and
                        Culture, Republic of Indonesia
                        <br>Guest Speakers:
                        <br><b>Dr. James Bennett</b> - Museum & Art of the Northern Territory, Australia
                        <br><b>Dr. Muqtedar Khan</b> - University of Delaware, United States of America (USA)
                        <br><b>Prof. Dr. Khairul Azril Ismail</b> - National Academy of Arts, Culture, and Heritage,
                        Malaysia
                    </p>
                    <p style="font-size: 14px;">In addition to keynote speakers and guest speakers, this conference will
                        also hold panel sessions with paper presentations, which will open abstract submissions from April
                        10-20, 2024. The conference also invites participants from various regions around the world. The
                        conference is planned to be held in a hybrid format so that besides participants and presenters who
                        are present on location, they are also invited online.</p>

                    <h5 class="mt-2">Schedule</h5>
                    <p style="font-size: 14px;">This International Conference will be held on:
                        <br>Day/Date: Monday, May 6, 2024
                        <br>Time: 09:30 a.m. - 04:00 p.m.
                        <br>Location: Main Building of ISBI Aceh
                        <br>Address: Jln. Transmigration, Gampong Buket Meusara , Kota Jantho, Aceh Besar, Aceh
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <img src="{{ asset('assets/argon') }}/img/brand/seminar-3.png" alt="Seminar Image"
                        class="img-fluid mb-3">
                    <h2>International Conference Registration</h2>
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> About us International Confrerence
                    </a>
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
                    <form action="{{ route('pendaftaran.seminar.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><b>Full Name :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_lengkap"
                                name="nama_lengkap"
                                placeholder="e.g Ratri Candrasari (Author 1), Indra Satriya (Author 2)...etc" required>
                            <small>
                                <h5>* Enter your full name along with your title if any.</h5>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Email :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="email"
                                name="email" placeholder="ratricandrasar@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><b>Personal Address :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="alamat"
                                name="alamat" placeholder="Kota Jantho, Aceh Besar, Aceh" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi"><b>Aviliation/Institution Name :</b></label>
                            <input type="text" class="form-control form-control-alternative" id="nama_instansi"
                                name="nama_instansi" placeholder="Institut Seni Budaya Indonesia Aceh or PT. Cendana"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"><b>Mobile Phone Number :</b></label>
                            <input type="number" class="form-control form-control-alternative" id="no_hp"
                                name="no_hp" placeholder="080820242024" required>
                        </div>
                        <div class="form-group">
                            <label for="status"><b>Registered as :</b></label>
                            <select class="form-control form-control-alternative" id="status" name="status">
                                <option>Peserta Daring</option>
                                <option>Peserta Luring</option>
                                <option>Pemakalah Daring</option>
                                <option>Pemakalah Luring</option>
                            </select>
                            <small class="mt-2" style="margin: 0; padding: 0;">
                                <h5>* Free participant registration</h5>
                            </small>
                            <small class="mt-1">
                                <h5>
                                    ** Offline presenters will get a book of abstract.
                                </h5>
                                <h5>
                                    *** I am willing to attend the event and cover accommodation and transportation costs.
                                </h5>
                                <h5 style="color: #e00808 !important;">
                                    **** Presenter registration is subject to a publication fee of <b>IDR 250.000 or
                                        $16</b>, to be be transfered
                                    to <b>MANDIRI-158-00-0019568-5 (Nisa Putri)</b>.
                                </h5>
                            </small>
                        </div>
                        <div id="tambahan_pemakalah" style="display: none;">
                            <div class="form-group">
                                <label for="judul"><b>Paper Title :</b></label>
                                <input type="text" class="form-control form-control-alternative" id="judul"
                                    name="judul" placeholder="Title of your paper...">
                            </div>
                            <div class="form-group">
                                <label for="abstrak"><b>Abstract :</b></label>
                                <textarea type="text-area" class="form-control form-control-alternative" id="abstrak" name="abstrak"
                                    rows="6" placeholder="Type or copy paste abstract of your paper..."></textarea>
                                <small>
                                    <h5>* Abstract written in 150-250 words</h5>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="keywords"><b>Keywords :</b></label>
                                <input type="text" class="form-control form-control-alternative" id="keywords"
                                    name="keywords" placeholder="Keyword 1, Keyword  2, Keyword 3">
                                <small>
                                    <h5>* Keywords up to 3-5 words</h5>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="bukti_pembayaran"><b>Proof of Publication Payment :</b></label>
                                <input type="text" class="form-control form-control-alternative" id="bukti_pembayaran"
                                    name="bukti_pembayaran" placeholder="20-02-2024, 01230456, Indra">
                                <small>
                                    <h5>* Input with rules for transfer date, account number, account owner's name, or
                                        transferor's name.</h5>
                                </small>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="pernyataan" value="0">
                            <!-- Tambahkan input tersembunyi untuk nilai default -->
                            <input type="checkbox" class="form-check-input" id="pernyataan" name="pernyataan"
                                value="1" required>
                            <label class="form-check-label" for="pernyataan"><b>I'm agree to all terms</b></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('status').addEventListener('change', function() {
            var tambahan_pemakalah = document.getElementById('tambahan_pemakalah');
            if (this.value === 'Pemakalah Daring' || this.value === 'Pemakalah Luring') {
                tambahan_pemakalah.style.display = 'block';
            } else {
                tambahan_pemakalah.style.display = 'none';
            }
        });
    </script>

    <script>
        // Show modal when page is loaded
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
@endsection
