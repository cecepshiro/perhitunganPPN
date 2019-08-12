@extends('layouts.app')

@section('content')

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Sistem Perhitungan PPN</a>
        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="blue"
        data-image="{{ asset('assets_login/img/background/background-2.jpg') }}">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <div class="col-md-10 col-sm-offset-1">
                        <div class="card" data-background="color" data-color="blue">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Tracking Pengajuan</h3>
                            </div>
                            <div class="card-content">

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
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokumen</th>
                                                    <th>Dokumen</th>
                                                    <th>Status</th>
                                                    <th>Dibuat</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokumen</th>
                                                    <th>Dokumen</th>
                                                    <th>Status</th>
                                                    <th>Dibuat</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $no=0; ?>
                                                @foreach($data as $row)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $row->dokumen }}</td>
                                                    <td><a href="{{ url('pengaju/downloadIzinUsaha/'. $row->id_pengaju) }}">{{ $row->path_dokumen }}</a></td>
                                                    <td>{{ $row->status }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>
                                                    @if($row->status == "revisi")
                                                    <a href="{{ url('pengaju/updateTracking/'.$row->id_detail_pengaju) }}" class="btn btn-fill btn-warning">Ubah</a>
                                                    @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- <a href="{{ url('pengaju/updateTracking/'.$row->id_pengaju) }}" class="btn btn-fill btn-warning">Ubah</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <div class="copyright">
                    &copy; <script>
                        document.write(new Date().getFullYear())

                    </script>, made <i class="fa fa-heart heart"></i> by <a
                        href="https://www.compunerd.id/">Compunerd</a>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
