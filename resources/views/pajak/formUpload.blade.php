@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('pajak/uploadBukti/'. $data['id_pajak']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Upload Bukti Bayar
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
                            <label>ID Pajak</label>
                            <input type="text" placeholder="Masukan id pajak" value="{{ $data['id_pajak'] }}" required readonly name="id_dokumen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bukti Bayar</label>
                            <input type="file" accept="image/jpg, image/jpeg, image/png, .docx, .pdf, .csv, .xls" placeholder="Masukan bukti bayar" required name="file" autofocus class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label>Jenis Pajak</label>
                            <input type="text" placeholder="Masukan jenis pajak" required name="id_jenis_pajak" class="form-control">
                        </div> -->
                        <button type="submit" class="btn btn-fill btn-success">Simpan</button>
                        <a href="{{ url('pajak/listDokumen/'. Auth::user()->id) }}" class="btn btn-fill btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
