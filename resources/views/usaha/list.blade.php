@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Kelola Data Usaha - {{ $data2->nama_pengguna }}</h4>
            <p class="category"><a href="{{ url('usaha/create') }}" class="btn btn-primary btn-md">Tambah Data</a></p>
            <div class="card">
                <div class="card-content">
                    <div class="toolbar">
                    </div>
                    @if($message = Session::get('success'))
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
                    <div class="fresh-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Usaha</th>
                                    <th>Keterangan</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Usaha</th>
                                    <th>Keterangan</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach($data as $row)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_usaha }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>
                                        <a href="{{ url('dokumen/listDokumen/'.$row->id_usaha) }}"
                                            class="btn btn-warning btn-sm "></i>Daftar Dokumen</a>
                                        <a href="{{ url('usaha/hapus/'.$row->id_usaha) }}"
                                            class="btn btn-danger btn-sm "></i>Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>
@endsection
