@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="#" action="#">
                    <div class="card-header">
                        <h4 class="card-title">
                            Detail Data Petugas
                        </h4>
                    </div>
                    <div class="card-content">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="form-group">
                            <label>ID Petugas</label>
                            <input type="text" placeholder="" value="{{ $data['id_petugas'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" placeholder="" value="{{ $data['nama_petugas'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" placeholder="" value="{{ $data['tempat_lahir'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" placeholder="" value="{{ $data['tanggal_lahir'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" placeholder="" value="{{ $data['jenis_kelamin'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" placeholder="" value="{{ $data['no_telp'] }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" placeholder="" readonly class="form-control">{{ $data['alamat'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="text" placeholder="" value="{{ $data['foto'] }}" readonly class="form-control">
                        </div>
                            <a href="{{ url('petugas/index/') }}" class="btn btn-fill btn-danger">Kembali</a>                        
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
