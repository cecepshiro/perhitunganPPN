@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Log Dokumen - {{ $tmp_id_dok }}</h4>
            <p class="category"></p>
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
                                    <th>Nama Dokumen</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach($data as $row)
                                <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_dokumen }}</td>
                                    <td><a
                                            href="{{ url('dokumen/downloadDokumen/'. $row->id_dokumen) }}">{{ $row->dokumen }}</a>
                                    </td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->created_at }}</td>
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
