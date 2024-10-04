@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-body py-7 py-lg-8" style="background-image: url('{{ asset('assets/argon/img/brand/background-2.jpg') }}'); background-position: left left; background-attachment: fixed; background-size: cover;">
        <div class="container">
            <div class="header-body text-center mt-2 mb-5">
                <div class="row">
                    <div class="container">
                        <div class="row justify-content-center col-lg-12 col-md-6">
                            <h1 class="text-blue">{{ __('Welcome to Kongres Peradaban Aceh.') }}</h1>
                        </div>
                        <p class="mb-3">Daftarkan diri Anda sekarang!</p>
                    </div>
                    <div class="container">
                        {{-- <div class="row justify-content-center mb-4">
                            <div class="col-md-12 text-center">
                                <a href="/kongres_form" class="btn btn-primary mr-md-2 mb-2 mb-md-0 long-button-two" style="background-color: #ffffff; color: #0e80eb;">Kongres Peradaban Aceh II</a>
                                
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-6 mx-auto mb-2">
                                        <a href="/seminar_form" class="btn btn-primary long-button" style="background-color: #ffffff; color: #0e80eb; width:350px">
                                            <i class="fas fa-globe"></i> International Conference
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto mb-2">
                                        <a href="/kemah_form" class="btn btn-primary long-button" style="background-color: #ffffff; color: #0e80eb; width:350px">
                                            <i class="fas fa-home"></i> Kemah Seniman dan Budayawan
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto mb-2">
                                        <a href="/pameran_form" class="btn btn-primary long-button" style="background-color: #ffffff; color: #0e80eb; width:350px">
                                            <i class="fas fa-podcast"></i> Pameran
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto mb-2">
                                        <a href="/pertunjukan_form" class="btn btn-primary long-button" style="background-color: #ffffff; color: #0e80eb; width:350px">
                                            <i class="fas fa-american-sign-language-interpreting"></i> Pertunjukan Seni Budaya
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto mb-2">
                                        <a href="/workshop_form" class="btn btn-primary long-button" style="background-color: #ffffff; color: #0e80eb; width:350px">
                                            <i class="fas fa-users"></i> Workshop
                                        </a>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

