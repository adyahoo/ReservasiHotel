@extends('admin.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Reservasi</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Reservasi</h4>
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
                                                <th>Kamar</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($reservasis as $reservasi)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                @if($reservasi->tamu->is_group!=1)
                                                <td>{{$reservasi->tamu->nama_depan}} {{$reservasi->tamu->nama_belakang}}</td>
                                                @else
                                                <td>{{$reservasi->tamu->nama_grup}}</td>
                                                @endif
                                                <td>{{$reservasi->jenisKamar->nama}}</td>
                                                <td>{{$reservasi->check_in}}</td>
                                                <td>{{$reservasi->check_out}}</td>
                                                <td>
                                                    @if($reservasi->status == 'verified')
                                                    <div class="badge badge-success">{{$reservasi->status}}</div>
                                                    @elseif($reservasi->status == 'validating')
                                                    <div class="badge badge-info">{{$reservasi->status}}</div>
                                                    @else
                                                    <div class="badge badge-danger">{{$reservasi->status}}</div>
                                                    @endif
                                                </td>
                                                <td><a href="{{route('detailReservasi',$reservasi->id)}}" class="btn btn-primary">Detail</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
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
@endpush