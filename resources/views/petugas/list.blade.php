@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Kelola Data Petugas</h4>
            <p class="category"><a href="{{ url('petugas/create') }}" class="btn btn-primary btn-md">Tambah Data</a>
            </p>
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
                                    <th>Nama Petugas</th>
                                    <th>Tempat Lahir</th>
                                    <th>JK</th>
                                    <th>Bagian</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Tempat Lahir</th>
                                    <th>JK</th>
                                    <th>Bagian</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach($data as $row)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_petugas }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>
                                    @if($row->level==0)
                                        Super Admin
                                    @elseif($row->level==1)
                                        Petugas Perizinan
                                    @elseif($row->level==2)
                                        Petugas Pajak
                                    @elseif($row->level==3)
                                        Petugas Akutansi
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('petugas/hapus/'.$row->id_petugas) }}"
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
