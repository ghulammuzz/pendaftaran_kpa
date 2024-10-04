@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Data Peserta Workshop</h2>
                    <hr>
                </div>
            </div>
            <table class="table">
                <thead class="text-center" style="background-color: #85b6fbc4;">
                    <tr>
                        <th style="width: 30%;">
                            <h4>Nama Kegiatan</h4>
                        </th>
                        <th style="width: 30%;">
                            <h4>Jumlah Peserta</h4>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($jumlahKemunculanAcara as $jenisAcara => $jumlahPeserta)
                        <tr>
                            <td>{{ $jenisAcara }}</td>
                            <td>{{ $jumlahPeserta }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
