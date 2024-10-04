@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Data Peserta Kongres</h2>
                    <hr>
                </div>
            </div>
            <table class="table">
                <thead class="text-center" style="background-color: #85b6fbc4;">
                    <tr>
                        <th style="width: 10%;">
                            <h4>#</h4>
                        </th>
                        <th style="width: 30%;">
                            <h4>Nama Peserta</h4>
                        </th>
                        <th style="width: 30%;">
                            <h4>Asal Instansi</h4>
                        </th>
                        <th style="width: 30%;">
                            <h4>Rencana Menginap</h4>
                        </th>
                        {{-- <th style="width: 30%;">
                            <h4>Penyataan</h4>
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pesertas as $index => $peserta)
                        <tr>
                            <td style="line-height: 1;">{{ $loop->iteration + $pesertas->firstItem() - 1 }}</td>
                            <td style="line-height: 1;">{{ $peserta->nama_lengkap }}</td>
                            <td style="line-height: 1;">{{ $peserta->nama_instansi }}</td>
                            <td style="line-height: 1;">{{ $peserta->penginapan }}</td>
                            {{-- <td style="line-height: 1;">
                                @if($peserta->pernyataan == 1)
                                    Bersedia
                                @endif
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Showing {{ $pesertas->firstItem() }} to {{ $pesertas->lastItem() }} of {{ $pesertas->total() }} entries</span>
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
