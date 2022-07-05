@extends('client.layout')
@section('title', 'Data Diri')

@push('css')
@endpush

@section('content')
<div class="content">
    <h2 class="mb-3">Data Diri</h2>
    <form method="POST" action="{{route('storeTamu')}}">
        @csrf
        <div class="row justify-content-center type-container mb-4">
            <div class="custom-control custom-radio mr-3">
                <input type="radio" id="radioPribadi" name="is_group" value="pribadi" class="custom-control-input" checked>
                <label class="custom-control-label font-weight-bold" for="radioPribadi">Pribadi</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="radioGroup" name="is_group" value="group" class="custom-control-input">
                <label class="custom-control-label font-weight-bold" for="radioGroup">Group</label>
            </div>
        </div>
        <div class="section-input text-left">
            <div class="row justify-content-between mb-3 px-5">
                <div class="col-12 col-lg-5" id="firstNameContainer">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="nama_depan" placeholder="ex: John">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="lastNameContainer">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="nama_belakang" placeholder="ex: Doe">
                    </div>
                </div>
                <div class="col-12 col-lg-5" id="groupContainer">
                    <div class="form-group">
                        <label for="groupName">Group Name</label>
                        <input type="text" class="form-control" id="groupName" name="nama_grup" placeholder="ex: John Doe Squad">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ex: John@doe.com">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="telepon" placeholder="ex: 08909890890">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="negara" placeholder="ex: Indonesia">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="kota" placeholder="ex: Denpasar">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="alamat" placeholder="ex: Jalan Gatot Subroto">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label for="postal">Postal Code</label>
                        <input type="number" class="form-control" id="postal" name="kode_pos" placeholder="ex: 80112">
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
    $(document).ready(() => {
        $('#groupContainer').hide()
        $('input[name="is_group"]:radio').change(() => {
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
        });
    })
</script>
@endpush