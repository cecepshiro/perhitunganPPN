@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="#" action="#">
                    <div class="card-header">
                        <h4 class="card-title">
                            Detail Data Pengaju
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label>ID Pengaju</label>
                            <input type="text" placeholder="" value="{{ $data['id_pengaju'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Pengaju</label>
                            <input type="text" placeholder="" value="{{ $data['nama_pengaju'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No. NPWP</label>
                            <input type="text" placeholder="" value="{{ $data['no_npwp'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" placeholder="" value="{{ $data['email'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" placeholder="" value="{{ $data['nama_usaha'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bukti Izin Usaha</label>
                            <a href="{{ url('pengaju/downloadIzinUsaha/'. $data['id_pengaju']) }}" class="form-control" >Download Bukti Izin Usaha</a>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" placeholder="" value="{{ $data['status'] }}" readonly class="form-control">
                        </div>
                        @if($data['status'] == "pending" || $data['status'] == "revisi")
                            <a href="{{ url('pengaju/createAccount/'. $data['id_pengaju']) }}" class="btn btn-fill btn-success">Terima</a>
                            <a href="" class="btn btn-fill btn-warning">Revisi</a>
                        @else
                            <a href="{{ url('pengaju/index') }}" class="btn btn-fill btn-danger">Kembali</a>
                        @endif
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
