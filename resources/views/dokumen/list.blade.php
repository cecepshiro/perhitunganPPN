@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Kelola Data Dokumen - {{ $data2->nama_pengguna }}</h4>
            <p class="category"><a href="{{ url('dokumen/create/'.$data2->user_id ) }}"
                    class="btn btn-primary btn-md">Tambah Dokumen</a></p>
            <div class="card">
                <div class="card-content">
                    <div class="toolbar">
                        <!--Here you can write extra buttons/actions for the toolbar-->
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
                                    <th>ID Dokumen</th>
                                    <th>Nama Dokumen</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Dokumen</th>
                                    <th>Nama Dokumen</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach($data as $row)
                                <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->id_dokumen }}</td>
                                    <td>{{ $row->nama_dokumen }}</td>
                                    <td><a
                                            href="{{ url('dokumen/downloadDokumen/'. $row->id_dokumen) }}">{{ $row->dokumen }}</a>
                                    </td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        @if(Auth::user()->level==1)
                                        <a href="{{ url('dokumen/revisiDokumen/'.$row->id_dokumen) }}"
                                            class="btn btn-warning btn-sm "></i>Revisi</a>
                                        <a href="{{ url('dokumen/acceptDokumen/'.$row->id_dokumen) }}"
                                            class="btn btn-success btn-sm "></i>Accept</a>
                                        @elseif(Auth::user()->level==4)
                                            @if($row->status=="revisi")
                                                <a href="{{ url('dokumen/edit/'.$row->id_dokumen) }}"
                                                class="btn btn-info btn-sm"></i>Ubah</a>
                                            @else
                                                <a href="{{ url('dokumen/hapus/'.$row->id_dokumen) }}"
                                                class="btn btn-danger btn-sm"></i>Hapus</a>
                                            @endif
                                        @endif
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