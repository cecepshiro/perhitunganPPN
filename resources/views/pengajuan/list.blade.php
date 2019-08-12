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
                    <div class="row">
                        <div class="left-vertical-tabs">
                            <ul class="nav nav-stacked" role="tablist">
                                <li class="active">
                                    <a href="#info" role="tab" data-toggle="tab">
                                        Pending
                                    </a>
                                </li>
                                <li>
                                    <a href="#description" role="tab" data-toggle="tab">
                                        Revisi
                                    </a>
                                </li>
                                <li>
                                    <a href="#revisidone" role="tab" data-toggle="tab">
                                        Telah Direvisi
                                    </a>
                                </li>
                                <li>
                                    <a href="#concept" role="tab" data-toggle="tab">
                                        Accept
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-text-tabs">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <p>
                                        <div class="fresh-datatables">
                                            <table id="datatables"
                                                class="table table-striped table-no-bordered table-hover"
                                                cellspacing="0" width="100%" style="width:100%">
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
                                                    <?php $no=0; ?>
                                                    @foreach($data2 as $row)
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $row->nama_pengaju }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->nama_usaha }}</td>
                                                        <td>{{ $row->status }}</td>
                                                        <td>
                                                            <a href="{{ url('pengaju/detail/'.$row->id_detail_pengaju) }}"
                                                                class="btn btn-primary btn-sm "></i>Detail</a>
                                                            <!-- <a href="{{ url('pengaju/hapus/'.$row->id_pengaju) }}"
                                                                class="btn btn-danger btn-sm "></i>Hapus</a> -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="description">
                                    <p>
                                        <div class="fresh-datatables">
                                            <table id="datatables2"
                                                class="table table-striped table-no-bordered table-hover"
                                                cellspacing="0" width="100%" style="width:100%">
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
                                                    <?php $no=0; ?>
                                                    @foreach($data3 as $row)
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $row->nama_pengaju }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->nama_usaha }}</td>
                                                        <td>{{ $row->status }}</td>
                                                        <td>
                                                            <a href="{{ url('pengaju/detail/'.$row->id_detail_pengaju) }}"
                                                                class="btn btn-primary btn-sm "></i>Detail</a>
                                                            <!-- <a href="{{ url('pengaju/hapus/'.$row->id_pengaju) }}"
                                                                class="btn btn-danger btn-sm "></i>Hapus</a> -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="concept">
                                    <p>
                                        <div class="fresh-datatables">
                                            <table id="datatables3"
                                                class="table table-striped table-no-bordered table-hover"
                                                cellspacing="0" width="100%" style="width:100%">
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
                                                    <?php $no=0; ?>
                                                    @foreach($data as $row)
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $row->nama_pengaju }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->nama_usaha }}</td>
                                                        <td>{{ $row->status }}</td>
                                                        <td>
                                                            <a href="{{ url('pengaju/detail/'.$row->id_detail_pengaju) }}"
                                                                class="btn btn-primary btn-sm "></i>Detail</a>
                                                            <!-- <a href="{{ url('pengaju/hapus/'.$row->id_pengaju) }}"
                                                                class="btn btn-danger btn-sm "></i>Hapus</a> -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="revisidone">
                                    <p>
                                        <div class="fresh-datatables">
                                            <table id="datatables4"
                                                class="table table-striped table-no-bordered table-hover"
                                                cellspacing="0" width="100%" style="width:100%">
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
                                                    <?php $no=0; ?>
                                                    @foreach($data4 as $row)
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $row->nama_pengaju }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->nama_usaha }}</td>
                                                        <td>{{ $row->status }}</td>
                                                        <td>
                                                            <a href="{{ url('pengaju/detail/'.$row->id_detail_pengaju) }}"
                                                                class="btn btn-primary btn-sm "></i>Detail</a>
                                                            <!-- <a href="{{ url('pengaju/hapus/'.$row->id_pengaju) }}"
                                                                class="btn btn-danger btn-sm "></i>Hapus</a> -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="support">
                                    <p>From the seamless transition of glass and metal to the streamlined profile, every
                                        detail was carefully considered to enhance your experience. So while its display
                                        is larger, the phone feels just right.</p>
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                </div>
                                <div class="tab-pane" id="extra">
                                    <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.
                                        With a smooth metal surface that seamlessly meets the new Retina HD display.
                                    </p>
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>
@endsection
