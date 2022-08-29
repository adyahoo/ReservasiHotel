@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Tamu</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Data Tamu</h4>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body p-2 pt-2">
                                <form method="POST" action="{{route('editTamu', $tamu->id)}}">
                                    @csrf
                                    <div class="row justify-content-between mb-3 px-5">
                                        @if($tamu->is_group != 1)
                                        <div class="col-12 col-lg-5" id="firstNameContainer">
                                            <div class="form-group">
                                                <label for="firstName">Nama Depan</label>
                                                <input type="text" class="form-control" id="firstName" name="nama_depan" value="{{$tamu->nama_depan}}" placeholder="ex: John">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5" id="lastNameContainer">
                                            <div class="form-group">
                                                <label for="lastName">Nama Belakang</label>
                                                <input type="text" class="form-control" id="lastName" name="nama_belakang" value="{{$tamu->nama_belakang}}" placeholder="ex: Doe">
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12 col-lg-5" id="groupContainer">
                                            <div class="form-group">
                                                <label for="groupName">Nama Grup</label>
                                                <input type="text" class="form-control" id="groupName" name="nama_grup" value="{{$tamu->nama_grup}}" placeholder="ex: John Doe Squad">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$tamu->email}}" placeholder="ex: John@doe.com">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="phone">Telepon</label>
                                                <input type="tel" class="form-control" id="phone" name="telepon" value="{{$tamu->telepon}}" placeholder="ex: 08909890890">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="number" class="form-control" id="nik" name="nik" value="{{$tamu->nik}}" placeholder="ex: 51712312312">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{$tamu->pekerjaan}}" placeholder="ex: Programmer">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="state">Negara</label>
                                                <input type="text" class="form-control" id="state" name="negara" value="{{$tamu->negara}}" placeholder="ex: Indonesia">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="city">Kota</label>
                                                <input type="text" class="form-control" id="city" name="kota" value="{{$tamu->kota}}" placeholder="ex: Denpasar">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <input type="text" class="form-control" id="address" name="alamat" value="{{$tamu->alamat}}" placeholder="ex: Jalan Gatot Subroto">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="form-group">
                                                <label for="postal">Kode Pos</label>
                                                <input type="number" class="form-control" id="postal" name="kode_pos" value="{{$tamu->kode_pos}}" placeholder="ex: 80112">
                                            </div>
                                        </div>
                                        <input type="hidden" id="isGroup" name="is_group" value="{{$tamu->is_group}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
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
@if(session()->has('error'))
<script>
    $(document).ready(() => {
        showAlert(
            "{{session('error')['type']}}",
            "{{session('error')['title']}}",
            "{{ucfirst(session('error')['message'][0])}}",
        )
    })
</script>
@endif
@endpush