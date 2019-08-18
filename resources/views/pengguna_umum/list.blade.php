@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Kelola Data Pengguna Umum</h4>
            <p class="category">A powerful jQuery plugin handcrafted by our friends from <a
                    href="https://datatables.net/" target="_blank">dataTables.net</a>. It is a highly flexible tool,
                based upon the foundations of progressive enhancement and will add advanced interaction controls to any
                HTML table. Please check out the <a href="https://datatables.net/manual/index" target="_blank">full
                    documentation.</a></p>

            <br>

            <div class="card">
                <div class="card-content">
                    <div class="toolbar">
                        <!--Here you can write extra buttons/actions for the toolbar-->
                    </div>
                    <div class="fresh-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tgl. Lahir</th>
                                    <th>JK</th>
                                    <th>No. Telp</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tgl. Lahir</th>
                                    <th>JK</th>
                                    <th>No. Telp</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $no=0; ?>
                            @foreach($data as $row)
                            <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_pengguna }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->no_telp }}</td>
                                    <td>
                                        <a href="{{ url('usaha/listUsaha/'.$row->user_id) }}" class="btn btn-warning btn-sm "></i>Dokumen</a>
                                        <a href="{{ url('pumum/detail/'.$row->id_pengguna) }}" class="btn btn-primary btn-sm "></i>Detail</a>
                                        <!-- <a href="{{ url('pumum/hapus/'.$row->id_pengguna) }}" class="btn btn-danger btn-sm "></i>Hapus</a> -->
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
