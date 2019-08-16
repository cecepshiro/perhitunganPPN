@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('usaha/simpan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Tambah Data Usaha
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
                            <label>Nama Usaha</label>
                            <input type="text" placeholder="" name="nama_usaha" required autofocus class="form-control">
                            <input type="hidden" placeholder="" name="user_id" value="{{ Auth::user()->id }}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" placeholder="" name="keterangan" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-success">Simpan</button>
                        <a href="{{ url('usaha/index') }}" class="btn btn-fill btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
