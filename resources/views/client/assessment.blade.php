@extends('client.layout')
@section('title', 'Assessment')

@push('css')
<link rel="stylesheet" href="{{asset('css/client/assessment.css')}}" />
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Self Assessment Covid-19</h2>
    <form method="POST" action="{{route('storeAssessment')}}">
        @csrf
        <input type="hidden" name="id_reservasi" id="id_reservasi" value="{{$id_reservasi}}" />
        <div class="section-input text-left">
            <div class="row justify-content-between mb-3 px-5">
                @foreach($tamus as $tamu)
                <input type="hidden" name="id_tamu" id="id_tamu" value="{{$tamu->id}}" />
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @if($tamu->is_group)
                        <input type="text" class="form-control" id="name" name="name" value="{{$tamu->nama_grup}}" placeholder="ex: Doe" disabled>
                        @else
                        <input type="text" class="form-control" id="name" name="name" value="{{$tamu->nama_depan}}" placeholder="ex: Doe" disabled>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="ex: 51712312312">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$tamu->alamat}}" placeholder="ex: 10" disabled>
                    </div>
                </div>
                @endforeach
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="pekerjaan">Occupation</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="ex: Programmer">
                    </div>
                </div>
                <div class="section-self-assessment">
                    <div class="survey-title mb-3">
                        Demi kesehatan dan keselamatan bersama, mohon anda <span class="font-weight-bold">JUJUR</span> dalam menjawab pertanyaan di bawah ini.
                    </div>
                    Dalam 14 hari terakhir, apakah anda pernah mengalami hal-hal berikut :
                    <div class="section-survey mb-5">
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah pernah keluar rumah/tempat umum (pasar, fasyankes, kerumunan orang, dan lain-lain) ?
                            </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_1" id="assessment1True" value="1">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_1" id="assessment1False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah pernah menggunakan transportasi umum?
                            </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_2" id="assessment2True" value="1">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_2" id="assessment2False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah pernah melakukan perjalanan ke luar kota/international? </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_3" id="assessment3True" value="1">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_3" id="assessment3False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah anda mengikuti kegiatan yang melibatkan orang banyak?
                            </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_4" id="assessment4True" value="1">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_4" id="assessment4False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah memiliki riwayat kontak erat dengan orang yang dinyatakan ODP, PDP, atau konfirm COVID-19?
                            </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_5" id="assessment5True" value="5">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_5" id="assessment5False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-between pl-3 pr-3 mb-2">
                            <div class="col-8">
                                Apakah anda sedang mengalami demam, batuk, pilek, nyeri tenggorokan, dan/atau sesak nafas?
                            </div>
                            <div class="col-4 text-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_6" id="assessment6True" value="5">
                                    <label class="form-check-label" for="assessment1True">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="assessment_6" id="assessment6False" value="0" checked>
                                    <label class="form-check-label" for="assessment1False">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary custom-button float-right align-self-end">Next</button>
        </div>
    </form>
</div>
@endsection

@push('js')
@endpush