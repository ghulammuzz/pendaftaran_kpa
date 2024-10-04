@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Data Peserta Pertunjukan Seni Budaya</h2>
                    <hr>
                </div>
            </div>
            <table class="table">
                <thead class="text-center" style="background-color: #85b6fbc4;">
                    <tr>
                        <th style="width: 10%;">
                            <h5>#</h5>
                        </th>
                        <th style="width: 30%;">
                            <h5>Nama Penanggung Jawab</h5>
                        </th>
                        <th style="width: 30%;">
                            <h5>Komunitas/Sanggar</h5>
                        </th>
                        <th style="width: 30%;">
                            <h5>Nomor Handphone</h5>
                        </th>
                        <th style="width: 30%;">
                            <h5>Jenis Pertunjukan</h5>
                        </th>
                        <th style="width: 30%;">
                            <h5>Detail Informasi</h5>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pesertas as $index => $peserta)
                        <tr>
                            <td style="line-height: 1;">{{ $loop->iteration + $pesertas->firstItem() - 1 }}</td>
                            <td style="line-height: 1;">
                                {{ strlen($peserta->nama_lengkap) > 20 ? substr($peserta->nama_lengkap, 0, 20) . '...' : $peserta->nama_lengkap }}
                            </td>
                            <td style="line-height: 1;">
                                {{ strlen($peserta->nama_instansi) > 20 ? substr($peserta->nama_instansi, 0, 20) . '...' : $peserta->nama_instansi }}
                            </td>
                            <td style="line-height: 1;">{{ $peserta->no_hp }}</td>
                            <td style="line-height: 1;">{{ $peserta->jenis_pertunjukan }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#exampleModal{{ $peserta->id }}">
                                    <i class="fa fa-th-list" aria-hidden="true"></i> Detail
                                </a>

                                <!--Modal-->
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" id="exampleModal{{ $peserta->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel"><b> Detail Peserta</b></h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: left;">
                                                <!-- Isi dengan detail informasi peserta -->
                                                <p style="font-size: 14px;"><b>Nama Penanggung Jawab:</b> {{ $peserta->nama_lengkap }}</p>
                                                <p style="font-size: 14px; white-space: pre-line;"><b>Alamat:</b>
                                                    {{ $peserta->alamat }}</p>
                                                <p style="font-size: 14px;"><b>Nama Komunitas/Sanggar:</b>
                                                    {{ $peserta->nama_instansi }}</p>
                                                <p style="font-size: 14px;"><b>Nomor Handphone:</b> {{ $peserta->no_hp }}
                                                </p>
                                                <p style="font-size: 14px;"><b>Jenis Pertunjukan:</b> {{ $peserta->jenis_pertunjukan }}
                                                </p>
                                                <p style="font-size: 14px; white-space: pre-line;"><b>Sinopsis Pertunjukan:</b>
                                                    {{ $peserta->sinopsis }}</p>
                                                <p style="font-size: 14px;"><b>Jumlah Peserta:</b>
                                                    {{ $peserta->jumlah_peserta }}</p>
                                                <p style="font-size: 14px;"><b>Kebutuhan Perlengkapan:</b>
                                                    {{ $peserta->kebutuhan }}</p>


                                                <!-- tambahkan info lainnya sesuai kebutuhan -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <!-- Jika Anda membutuhkan tombol tambahan di modal, tambahkan di sini -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Showing {{ $pesertas->firstItem() }} to {{ $pesertas->lastItem() }} of
                    {{ $pesertas->total() }} entries</span>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        @if ($pesertas->previousPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $pesertas->previousPageUrl() }}"><i
                                        class="fa fa-arrow-circle-left"></i></a>
                            </li>
                        @endif

                        @php
                            $startPage = max(1, $pesertas->currentPage() - 1);
                            $endPage = min($pesertas->lastPage(), $startPage + 2);
                        @endphp

                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <li class="page-item {{ $i == $pesertas->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $pesertas->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($pesertas->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $pesertas->nextPageUrl() }}"><i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
