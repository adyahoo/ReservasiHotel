@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tamu</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Tamu</h4>
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
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($tamus as $tamu)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$tamu->nama_depan}} {{$tamu->nama_belakang}}</td>
                                                <td>{{$tamu->email}}</td>
                                                <td>{{$tamu->telepon}}</td>
                                                <td>{{$tamu->alamat}}</td>
                                                <td>
                                                    <!-- <form style="display: inline-block;" method="POST" action="{{route('deleteTamu', $tamu->id)}}" name="formDelete" id="formDelete-{{$tamu->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="deleteModal({{ $tamu->id }})" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form> -->
                                                    <a href="{{route('detailTamu', $tamu->id)}}" class="btn btn-icon btn-info"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> -->
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
<script>
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