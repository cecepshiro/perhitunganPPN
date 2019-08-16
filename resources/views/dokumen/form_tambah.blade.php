@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('dokumen/simpan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Tambah Data Dokumen
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
                            <label>Nama Dokumen</label>
                            <input type="text" placeholder="Masukan nama dokumen" required name="nama_dokumen" autofocus class="form-control">
                            <input type="hidden" placeholder="" name="user_id" value="{{ $data['user_id'] }}" required autofocus class="form-control">
                            <input type="hidden" placeholder="" name="id_usaha" value="{{ $data['id_usaha'] }}" required autofocus class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Dokumen</label>
                            <input type="file" accept="image/jpg, image/jpeg, image/png, .docx, .pdf, .csv, .xls"  placeholder="Masukan dokumen" required name="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-success">Simpan</button>
                        <a href="{{ url('dokumen/listDokumen/'. $data['id_usaha']) }}" class="btn btn-fill btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
