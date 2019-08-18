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
                                    $pajak_terbayar = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->count();
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
                                    $pajak_tertunggak = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->count();
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
                                <p>Jumlah Kategori Pajak</p>
                                <?php
                                    $jumlah_jenis_pajak = DB::table('data_jenis_pajak')->select('*')->count();
                                ?>
                                {{ $jumlah_jenis_pajak }}
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
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Petugas Terdaftar</p>
                                <?php
                                    $jumlah_petugas = DB::table('data_petugas')->select('*')->count();
                                ?>
                                {{ $jumlah_petugas }}
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
    <div class="row">
        <div class="col-lg-6 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <!-- Chart -->
                    <div style="width: 500px;height: 300x">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <!-- Chart -->
                    <div style="width: 500px;height: 300x">
                        <canvas id="myChar2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    //belum terbayar
    $b_januari = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '1')->count();
    $b_februari = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '2')->count();
    $b_maret = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '3')->count();
    $b_april = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '4')->count();
    $b_mei = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '5')->count();
    $b_juni = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '6')->count();
    $b_juli = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '7')->count();
    $b_agustus = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '8')->count();
    $b_september = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '9')->count();
    $b_oktober = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '10')->count();
    $b_november = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '11')->count();
    $b_desember = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'belum terbayar')->whereMonth('data_pajak.pajak_bulan', '12')->count();
    
    //terbayar
    $t_januari = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '1')->count();
    $t_februari = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '2')->count();
    $t_maret = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '3')->count();
    $t_april = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '4')->count();
    $t_mei = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '5')->count();
    $t_juni = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '6')->count();
    $t_juli = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '7')->count();
    $t_agustus = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '8')->count();
    $t_september = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '9')->count();
    $t_oktober = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '10')->count();
    $t_november = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '11')->count();
    $t_desember = DB::table('data_pajak')->select('*')->where('data_pajak.status', 'pembayaran dikonfirmasi')->whereMonth('data_pajak.pajak_bulan', '12')->count();
?>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Ferbruari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [{
                label: '# Pajak yang telah terbayar',
                data: [
                    {{ $t_januari }}, 
                    {{ $t_februari }}, 
                    {{ $t_maret }}, 
                    {{ $t_april }}, 
                    {{ $t_mei }}, 
                    {{ $t_juni }}, 
                    {{ $t_juli }}, 
                    {{ $t_agustus }}, 
                    {{ $t_september }}, 
                    {{ $t_oktober }}, 
                    {{ $t_november }}, 
                    {{ $t_desember}} ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(124, 80, 64, 0.2)',
                    'rgba(211, 100, 64, 0.2)',
                    'rgba(80, 120, 64, 0.2)',
                    'rgba(125, 200, 64, 0.2)',
                    'rgba(100, 180, 64, 0.2)',
                    'rgba(90, 255, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
<script>
    var ctx = document.getElementById("myChar2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Ferbruari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [{
                label: '# Pajak yang tidak terbayar',
                data: [
                    {{ $b_januari }}, 
                    {{ $b_februari }}, 
                    {{ $b_maret }}, 
                    {{ $b_april }}, 
                    {{ $b_mei }}, 
                    {{ $b_juni }}, 
                    {{ $b_juli }}, 
                    {{ $b_agustus }}, 
                    {{ $b_september }}, 
                    {{ $b_oktober }}, 
                    {{ $b_november }}, 
                    {{ $b_desember}} ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(124, 80, 64, 0.2)',
                    'rgba(211, 100, 64, 0.2)',
                    'rgba(80, 120, 64, 0.2)',
                    'rgba(125, 200, 64, 0.2)',
                    'rgba(100, 180, 64, 0.2)',
                    'rgba(90, 255, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
@endsection
