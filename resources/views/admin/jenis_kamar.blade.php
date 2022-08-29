@extends('admin.layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Jenis Kamar</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Data Jenis Kamar</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahJenisModal">
                            Tambah Jenis Kamar
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
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($jenisKamars as $jenisKamar)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$jenisKamar->nama}}</td>
                                                <td>
                                                    <!-- <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a> -->
                                                    <form style="display: inline-block;" method="POST" action="{{route('deleteJenisKamar', $jenisKamar->id)}}" name="formDelete" id="formDelete-{{$jenisKamar->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="deleteModal({{ $jenisKamar->id }})" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    <!-- <a data-toggle="modal" data-target="#editJenisModal" data-edit-route="{{route('editJenisKamar', $jenisKamar->id)}}" data-value="{{$jenisKamar->nama}}" data-index="{{$loop->index}}" id="btnEdit-{{$loop->index}}" class="btn btn-icon btn-success"><i class="fas fa-edit"></i></a> -->
                                                    <button type="button" onclick="editModal({{ $jenisKamar }})" class="btn btn-icon btn-success"><i class="fas fa-edit"></i></button>
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
</section>
<div class="modal" id="tambahJenisModal" tabindex="-1" role="dialog">
    <form method="POST" enctype="multipart/form-data" action="{{route('storeJenisKamar')}}" id="form">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jenis Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Jenis Kamar</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="ex: Deluxe">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal">Batalkan</button>
                    <!-- <button type="button" class="btn btn-primary" id="storeJenisKamar">Simpan</button> -->
                    <input type="submit" class="btn btn-primary" id="storeJenisKamar" />
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal" id="editJenisModal" tabindex="-1" role="dialog">
    <form method="POST" enctype="multipart/form-data" action="" id="formEdit" name="formEdit">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Jenis Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Jenis Kamar</label>
                        <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="ex: Deluxe" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline" data-dismiss="modal">Batalkan</button>
                    <input type="submit" class="btn btn-primary" id="editJenisKamar" />
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
    // $(document).ready(() => {
    //     $('#btnEdit-2').on('click', () => {
    //         alert($('#btnEdit-2').data('value'))
    //         $('#formEdit').attr('action', $('#btnEdit-2').data('edit-route'))
    //         $('#namaEdit').attr('value', $('#btnEdit-2').data('value'))
    //     })
    // })

    function editModal(item) {
        $('#editJenisModal').modal('show')
        var url = "{{route('editJenisKamar', '')}}" + "/" + item.id
        // url.replace(':id', 1)
        $('#formEdit').attr('action', url)
        $('#namaEdit').attr('value', item.nama)
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