@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Reservasi</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Data Reservasi</h4>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body p-2">
                                <form method="POST" action="{{route('confirmReservasi', $reservasi->id)}}">
                                    @csrf
                                    @if($reservasi->tamu->is_group != 1)
                                    <div class="row justify-content-between mt-3 px-3">
                                        <div class="col-12 col-lg-5" id="firstNameContainer">
                                            <div class="form-group">
                                                <label for="firstName">Nama Depan Tamu</label>
                                                <input type="text" class="form-control" id="firstName" name="nama_depan" value="{{$reservasi->tamu->nama_depan}}" placeholder="ex: John" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5" id="lastNameContainer">
                                            <div class="form-group">
                                                <label for="lastName">Nama Belakang Tamu</label>
                                                <input type="text" class="form-control" id="lastName" name="nama_belakang" value="{{$reservasi->tamu->nama_belakang}}" placeholder="ex: Doe" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="groupName">Nama Tamu</label>
                                            <input type="text" class="form-control" id="groupName" name="nama_grup" value="{{$reservasi->tamu->nama_grup}}" placeholder="ex: John Doe Squad" disabled>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="jenisKamar">Jenis Kamar</label>
                                            <input type="text" class="form-control" id="jenisKamar" name="jenis_kamar" value="{{$reservasi->jenisKamar->nama}}" placeholder="ex: Deluxe" disabled>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mt-3 px-3">
                                        <div class="col-12 col-lg-4" id="firstNameContainer">
                                            <div class="form-group">
                                                <label for="checkIn">Check In</label>
                                                <input type="text" class="form-control" id="checkIn" name="check_in" value="{{date('d F Y - H:i', strtotime($reservasi->check_in))}}" placeholder="ex: John" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4" id="lastNameContainer">
                                            <div class="form-group">
                                                <label for="checkOut">Check Out</label>
                                                <input type="text" class="form-control" id="checkOut" name="check_out" value="{{date('d F Y - H:i', strtotime($reservasi->check_out))}}" placeholder="ex: Doe" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4" id="lastNameContainer">
                                            <div class="form-group">
                                                <label for="totalStay">Total Hari Stay</label>
                                                <input type="text" class="form-control" id="totalStay" name="total_hari_stay" value="{{$reservasi->total_hari_stay}}" placeholder="ex: Doe" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mt-3 px-3">
                                        <div class="col-12 col-lg-5" id="firstNameContainer">
                                            <div class="form-group">
                                                <label for="totalDewasa">Total Dewasa</label>
                                                <input type="text" class="form-control" id="totalDewasa" name="total_dewasa" value="{{$reservasi->total_dewasa}}" placeholder="ex: John" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5" id="lastNameContainer">
                                            <div class="form-group">
                                                <label for="totalAnak">Total Anak</label>
                                                <input type="text" class="form-control" id="totalAnak" name="total_anak" value="{{$reservasi->total_anak}}" placeholder="ex: Doe" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label class="d-block" for="identity">Kartu Identitas</label>
                                            <img src="{{url('/images/'.$reservasi->identity)}}" style="max-width: 400; max-height:200;" height="auto" width="auto" alt="Image" />
                                        </div>
                                    </div>
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input type="hidden" name="noteValue" id="noteValue" value="{{$reservasi->note}}">
                                            <textarea id="note" name="note" rows="6" cols="250" maxlength="200" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="assessment">Total Poin COVID-19 Self Assessment</label>
                                            <input type="text" class="form-control" id="assessment" name="assessment" value="{{$reservasi->assessment->total}}" placeholder="ex: John Doe Squad" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="status">Status Reservasi</label>
                                            <input type="text" class="form-control" id="status" name="status" value="{{$reservasi->status}}" placeholder="ex: John Doe Squad" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12" id="groupContainer">
                                        <div class="form-group">
                                            <label for="note_validasi">Note Validasi</label>
                                            <input type="hidden" name="noteValidasi" id="noteValidasi" value="{{$reservasi->note_validasi}}">
                                            <textarea id="note_validasi" name="note_validasi" rows="6" cols="250" maxlength="200" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" value="verified" name="btn_submit" class="btn btn-primary float-right" {!!$reservasi->status != 'validating'?'disabled="disabled"':''!!} >Validasi</button>
                                    <button type="submit" value="rejected" name="btn_submit" class="btn btn-danger float-right mr-3" {!!$reservasi->status != 'validating'?'disabled="disabled"':''!!} >Tolak</button>
                                    <a href="{{url()->previous()}}" class="btn btn-secondary float-right mr-3">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(() => {
        var noteValue = $('#noteValue').val()
        var noteValidasi = $('#noteValidasi').val()
        $('#note').text(noteValue)
        $('#note_validasi').text(noteValidasi)
    })
</script>
@endpush