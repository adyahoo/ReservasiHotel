@extends('client.layout')
@section('title', 'Success Reservasi')

@push('css')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<link rel="stylesheet" href="{{asset('css/client/success_reservasi.css')}}" />
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Berhasil Melakukan Reservasi</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            @if($reservasi->status == 'validating')
            <lottie-player class="lottie ml-auto mr-auto" src="https://assets5.lottiefiles.com/packages/lf20_jzuzdkl5.json" background="transparent" speed="0.5" loop autoplay></lottie-player>
            <h4 class="font-weight-bold mb-4">Silahkan Tunggu Resepsionis Melakukan Verifikasi</h4>
            <div class="badge badge--validating">Validating</div>
            @elseif($reservasi->status == 'verified')
            <lottie-player class="lottie ml-auto mr-auto" src="https://assets7.lottiefiles.com/packages/lf20_rgdnbvya.json" background="transparent" speed="0.5" loop autoplay></lottie-player>
            <h4 class="font-weight-bold mb-4">Berhasil Melakukan Reservasi, <br>Silahkan Ikuti Arahan Resepsionis</h4>
            <div class="badge badge--verified">Verified</div>
            @else
            <lottie-player class="lottie ml-auto mr-auto" src="https://assets7.lottiefiles.com/packages/lf20_geewpiaj.json" background="transparent" speed="0.5" loop autoplay></lottie-player>
            <h4 class="font-weight-bold mb-4">Ada Kesalahan pada Data yang Anda Input, <br>Silahkan Perbaiki</h4>
            <div class="badge badge--rejected">Rejected</div>
            @endif
        </div>
    </div>
    @if($reservasi->status == 'rejected')
    <a href="{{route('editDataDiri', $reservasi->id)}}" class="btn btn-primary custom-button float-right align-self-end">Edit Data</a>
    @endif
</div>
@endsection

@push('js')
@endpush