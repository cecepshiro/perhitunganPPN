@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Kelola Data Pengajuan</h4>
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
                                    <th>Nama Pengaju</th>
                                    <th>Email</th>
                                    <th>Nama Usaha</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengaju</th>
                                    <th>Email</th>
                                    <th>Nama Usaha</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $row)
                            <? $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_pengaju }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->nama_usaha }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-simple btn-info btn-icon like"><i
                                                class="ti-heart"></i></a>
                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i
                                                class="ti-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i
                                                class="ti-close"></i></a>
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
