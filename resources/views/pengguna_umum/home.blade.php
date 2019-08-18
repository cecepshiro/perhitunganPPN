@extends('layouts.layout') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">

                                <i class="ti-stats-up"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Total Pajak Terbayar</p>
                                <?php
                                    $pajak_terbayar = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->where('data_pajak.user_id', Auth::user()->id)->count();
                                ?>
                                {{ $pajak_terbayar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-stats-down"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Total Pajak Tertunggak</p>
                                <?php
                                    $pajak_tertunggak = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->where('data_pajak.user_id', Auth::user()->id)->count();
                                ?>
                                {{ $pajak_tertunggak }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-pin-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Jumlah Usaha Terdaftar</p>
                                <?php
                                    $jumlah_usaha = DB::table('data_usaha')->select('*')->where('data_usaha.user_id', Auth::user()->id)->count();
                                ?>
                                {{ $jumlah_usaha }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-info text-center">
                                <i class="ti-file"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Jumlah Dokumen</p>
                                <?php
                                    $jumlah_dokumen = DB::table('data_dokumen')->select('*')->where('data_dokumen.user_id', Auth::user()->id)->count();
                                ?>
                                {{ $jumlah_dokumen }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection