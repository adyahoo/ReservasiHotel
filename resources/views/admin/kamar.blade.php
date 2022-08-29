@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kamar</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Data Kamar</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                            Tambah Data Kamar
                        </button>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Kamar</th>
                                                <th>Jenis Kamar</th>
                                                <th>Keterangan Kamar</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($kamars as $kamar)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$kamar->nomor_kamar}}</td>
                                                <td>{{$kamar->jenisKamar->nama}}</td>
                                                <td>
                                                    @if($kamar->keterangan_kamar != null)
                                                    {{$kamar->keterangan_kamar}}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a> -->
                                                    <form style="display: inline-block;" method="POST" action="{{route('deleteKamar', $kamar->id)}}" name="formDelete" id="formDelete-{{$kamar->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="deleteModal({{ $kamar->id }})" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    <!-- <a href="#" class="btn btn-icon btn-success"><i class="fas fa-edit"></i></a> -->
                                                    <button type="button" onclick="editModal({{ $kamar }})" class="btn btn-icon btn-success"><i class="fas fa-edit"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<div class="modal" id="tambahModal" tabindex="-1" role="dialog">
    <form method="POST" enctype="multipart/form-data" action="{{route('storeKamar')}}" id="form">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomor_kamar">Nomor Kamar</label>
                        <input type="number" class="form-control" id="nomor_kamar" name="nomor_kamar" placeholder="ex: 1001">
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_kamar">Jenis Kamar</label>
                        <select class="form-control" id="id_jenis_kamar" name="id_jenis_kamar">
                            @foreach($jenisKamars as $jenisKamar)
                            <option value="{{$jenisKamar->id}}">{{$jenisKamar->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Kamar</label>
                        <textarea id="keterangan" name="keterangan" rows="4" cols="250" maxlength="200" placeholder="ex: Double Bed" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal">Batalkan</button>
                    <input type="submit" class="btn btn-primary" id="storeKamar" />
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <form method="POST" enctype="multipart/form-data" action="" id="formEdit" name="formEdit">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomor_kamar">Nomor Kamar</label>
                        <input type="number" class="form-control" id="nomorKamarEdit" name="nomor_kamar" placeholder="ex: 1001" value="">
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_kamar">Jenis Kamar</label>
                        <select class="form-control" id="idJenis" name="id_jenis_kamar">
                            @foreach($jenisKamars as $jenisKamar)
                            <option value="{{$jenisKamar->id}}">{{$jenisKamar->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Kamar</label>
                        <textarea id="keteranganEdit" name="keterangan" rows="4" cols="250" maxlength="200" placeholder="ex: Double Bed" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal">Batalkan</button>
                    <input type="submit" class="btn btn-primary" id="editKamar" />
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
@if(session()->has('message'))
<script>
    $(document).ready(() => {
        showAlert(
            "{{session('message')['type']}}",
            "{{session('message')['title']}}",
            "{{session('message')['message']}}",
        )
    })
</script>
@endif
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
<script>
    function editModal(item) {
        $('#editModal').modal('show')
        var url = "{{route('editKamar', '')}}" + "/" + item.id
        $('#formEdit').attr('action', url)
        $('#nomorKamarEdit').attr('value', item.nomor_kamar)
        $(`#idJenis option[value=${item.id_jenis_kamar}]`).attr('selected', 'selected')
        $('#keteranganEdit').text(item.keterangan_kamar)
    }

    function deleteModal(id) {
        event.preventDefault()
        Swal.fire({
            icon: 'warning',
            title: 'Hapus Data?',
            text: 'Yakin ingin menghapus data ini?',
            confirmButtonText: 'Hapus',
            showDenyButton: true,
            denyButtonText: 'Cancel',
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                $(`#formDelete-${id}`).submit()
            }
        })
    }
</script>
@endpush