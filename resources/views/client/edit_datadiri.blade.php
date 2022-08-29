@extends('client.layout')
@section('title', 'Edit Data Diri')

@push('css')
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Edit Data Diri</h2>
    <form method="POST" action="{{route('updateDataDiri', $tamu->id)}}">
        @csrf
        <input type="hidden" id="id_reservasi" name="id_reservasi" value="{{$reservasi->id}}">
        <div class="row justify-content-center type-container mb-4">
            <div class="custom-control custom-radio mr-3">
                <input type="radio" id="radioPribadi" name="is_group" value="pribadi" class="custom-control-input" @if($tamu->is_group!=1) checked @endif>
                <label class="custom-control-label font-weight-bold" for="radioPribadi">Pribadi</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="radioGroup" name="is_group" value="group" class="custom-control-input" @if($tamu->is_group==1) checked @endif>
                <label class="custom-control-label font-weight-bold" for="radioGroup">Group</label>
            </div>
        </div>
        <div class="section-input text-left">
            <div class="row justify-content-between mb-3 px-5">
                <div class="col-12 col-lg-5" id="firstNameContainer">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="nama_depan" placeholder="ex: John" value="{{$tamu->nama_depan}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="lastNameContainer">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="nama_belakang" placeholder="ex: Doe" value="{{$tamu->nama_belakang}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="groupContainer">
                    <div class="form-group">
                        <label for="groupName">Group Name</label>
                        <input type="text" class="form-control" id="groupName" name="nama_grup" placeholder="ex: John Doe Squad" value="{{$tamu->nama_grup}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ex: John@doe.com" value="{{$tamu->email}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="telepon" placeholder="ex: 08909890890" value="{{$tamu->telepon}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="negara" placeholder="ex: Indonesia" value="{{$tamu->negara}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="kota" placeholder="ex: Denpasar" value="{{$tamu->kota}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="alamat" placeholder="ex: Jalan Gatot Subroto" value="{{$tamu->alamat}}">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="postal">Postal Code</label>
                        <input type="number" class="form-control" id="postal" name="kode_pos" placeholder="ex: 80112" value="{{$tamu->kode_pos}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary custom-button float-right">Next</button>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
    function tamuState() {
        var type = $('input[name="is_group"]:checked').val();
        console.log(type)
        if (type == 'group') {
            $('#firstNameContainer').hide()
            $('#lastNameContainer').hide()
            $('#groupContainer').show()
        } else {
            $('#firstNameContainer').show()
            $('#lastNameContainer').show()
            $('#groupContainer').hide()
        }
    }

    $(document).ready(() => {
        $('#groupContainer').hide()
        tamuState()
        $('input[name="is_group"]:radio').change(() => {
            tamuState()
        });
    })
</script>
@endpush