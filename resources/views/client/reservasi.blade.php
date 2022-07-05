@extends('client.layout')
@section('title', 'Reservasi')

@push('css')
<link rel="stylesheet" href="css/client/reservasi.css" />
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Reservasi</h2>
    <form method="POST" action="{{route('storeReservasi')}}" enctype="multipart/form-data">
        @csrf
        <div class="section-input text-left">
            <div class="row justify-content-between mb-3 px-5">
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="check_in">Check In Date</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" placeholder="ex: Doe">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="check_out">Check Out Date</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" placeholder="ex: Doe">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="groupContainer">
                    <div class="form-group">
                        <label for="id_kamar">Room Type</label>
                        <select class="form-control" id="id_kamar" name="id_kamar" onchange="kamar()">
                            @foreach($jenisKamars as $jenisKamar)
                            <option value="{{$jenisKamar->id}}">{{$jenisKamar->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="total_dewasa">Adult</label>
                        <input type="number" class="form-control" id="total_dewasa" name="total_dewasa" placeholder="ex: 10">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="total_anak">Children</label>
                        <input type="number" class="form-control" id="total_anak" name="total_anak" placeholder="ex: 10">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="identity">KTP/SIM</label>
                        <input type="file" class="form-control" id="identity" name="identity" placeholder="ex: Indonesia">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="note">Note</label>
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
        $('#kamar').val('qwsaf')
    })
</script>
@endpush