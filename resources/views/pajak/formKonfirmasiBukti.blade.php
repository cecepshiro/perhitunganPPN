@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('pajak/konfirmasiBukti/'. $data->id_pajak) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Konfirmasi Bukti Bayar
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
                            <input type="text" value="{{ $data->id_pajak }}" required readonly name="id_pajak" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID Dokumen</label>
                            <input type="text"  value="{{ $data->id_dokumen }}" required readonly name="id_dokumen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="text"  value="{{ $data->id_pengguna }}" required readonly name="id_pengguna" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"  value="{{ $data->nama_pengguna }}" required readonly name="nama_pengguna" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Omset</label>
                            <input type="text" value="{{ $data->omset }}" required readonly name="omset" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pajak</label>
                            <input type="text" value="{{ $data2->jenis_pajak }}" required readonly name="jenis_pajak" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Besar Pajak</label>
                            <input type="text" value="{{ $data2->besar_pajak }} %" required readonly name="besar_pajak" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pajak Yang Harus Dibayar</label>
                            <input type="text" value="{{ $data->bayaran }}" required readonly name="bayaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bukti Bayar</label>
                            <a href="{{ url('pajak/downloadBuktiBayar/'. $data->id_pajak) }}" class="form-control">{{ $data->bukti_bayar }}</a>
                        </div>
                        <button type="submit" class="btn btn-fill btn-success">Konfirmasi</button>
                        <a href="{{ url('pajak/index/') }}" class="btn btn-fill btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
