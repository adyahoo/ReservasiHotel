@extends('client.layout')
@section('title', 'Edit Reservasi')

@push('css')
<link rel="stylesheet" href="{{asset('css/client/reservasi.css')}}" />
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Edit Reservasi</h2>
    <form method="POST" action="{{route('updateReservasi', ['idTamu'=>$idTamu, 'idReservasi'=> $reservasi->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="section-input text-left">
            <div class="row justify-content-between mb-3 px-5">
                <input type="hidden" id="id_tamu" name="id_tamu" value="{{$idTamu}}" />
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="check_in">Check In Date</label>
                        <input type="datetime-local" class="form-control" id="check_in" name="check_in" placeholder="ex: Doe" value="{{$reservasi->check_in}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="check_out">Check Out Date</label>
                        <input type="datetime-local" class="form-control" id="check_out" name="check_out" placeholder="ex: Doe" value="{{$reservasi->check_out}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="groupContainer">
                    <div class="form-group">
                        <label for="id_kamar">Room Type</label>
                        <input type="hidden" id="kamarValue" name="kamarValue" value="{{$reservasi->id_kamar}}">
                        <select class="form-control" id="id_kamar" name="id_kamar">
                            @foreach($jenisKamars as $jenisKamar)
                            <option value="{{$jenisKamar->id}}">{{$jenisKamar->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="total_dewasa">Adult</label>
                        <input type="number" class="form-control" id="total_dewasa" name="total_dewasa" placeholder="ex: 10" value="{{$reservasi->total_dewasa}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="total_anak">Children</label>
                        <input type="number" class="form-control" id="total_anak" name="total_anak" placeholder="ex: 10" value="{{$reservasi->total_anak}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="userIdentity">KTP/SIM</label>
                        <input type="file" accept="image/*" class="form-control-file" id="userIdentity" name="userIdentity">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="hidden" name="noteValue" id="noteValue" value="{{$reservasi->note}}">
                        <textarea class="form-control" rows="3" id="note" name="note" placeholder="ex: Special Note From The Customer"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary custom-button float-right align-self-end">Next</button>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
    $(document).ready(() => {
        var noteValue = $('#noteValue').val()
        $('#note').text(noteValue)
        var kamarValue = $('#kamarValue').val()
        $(`#id_kamar option[value=${kamarValue}]`).attr('selected', 'selected')
    })
</script>
@endpush