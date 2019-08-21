@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('pajak/saveBesaran/'. $data['id_pajak']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Data Omset
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
                            <label>ID Usaha</label>
                            <input type="text" placeholder="Masukan id usaha" value="{{ $data['id_usaha'] }}" required readonly name="id_dokumen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" placeholder="Masukan nama usaha" value="{{ $data2['nama_usaha'] }}" required readonly name="id_dokumen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Omset</label>
                            <input type="text" placeholder="Masukan besar omset" value="{{ $data['omset'] }}" required name="omset" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pajak</label>
                            <select required name="id_jenis_pajak" class="form-control">
                                <option value="">=PILIH JENIS PAJAK=</option>
                                @foreach($jenispajak as $row)
                                    <option value="{{ $row->id_jenis_pajak }}">{{ $row->jenis_pajak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-success">Simpan</button>
                        <a href="{{ url('dokumen/listDokumen/'. $data['id_usaha']) }}" class="btn btn-fill btn-warning">Lihat Dokumen</a>
                        <a href="{{ url('pajak/index/') }}" class="btn btn-fill btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
