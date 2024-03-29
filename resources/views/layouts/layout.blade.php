<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sistem Perhitungan PPN</title>

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-pro" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--  Social tags      -->
    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap dashboard, bootstrap, css3 dashboard, bootstrap admin, paper bootstrap dashboard, frontend, responsive bootstrap dashboard">
    <meta name="description"
        content="Paper Dashboard PRO is a beautiful Bootstrap admin dashboard with a large number of components, designed to look neat and organised. ">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard PRO by Creative Tim">
    <meta itemprop="description"
        content="Paper Dashboard PRO is a beautiful Bootstrap admin dashboard with a large number of components, designed to look neat and organised. If you are looking for a tool to manage and visualise data about your business, this dashboard is the thing for you.">

    <meta itemprop="image"
        content="../../../../s3.amazonaws.com/creativetim_bucket/products/47/original/opt_pdp_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
        content="Paper Dashboard PRO is a beautiful Bootstrap admin dashboard with a large number of components, designed to look neat and organised.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="../../../../s3.amazonaws.com/creativetim_bucket/products/47/original/opt_pdp_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Paper Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="overview.html" />
    <meta property="og:image"
        content="../../../../s3.amazonaws.com/creativetim_bucket/products/47/original/opt_pdp_thumbnail.jpg" />
    <meta property="og:description"
        content="Paper Dashboard PRO is a beautiful Bootstrap admin dashboard with a large number of components, designed to look neat and organised." />
    <meta property="og:site_name" content="Creative Tim" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <!-- charts js -->
    <script src="{{ asset('assets/js/Chart.js') }}" type="text/javascript"></script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');

    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="brown" data-active-color="danger">
            <!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    CT
                </a>

                <a href="{{ url('/') }}" class="simple-text logo-normal">
                    Prototype
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="info">
                        <div class="photo">
                            @if(Auth::user()->level==1 || Auth::user()->level==2 || Auth::user()->level==3)
                                <?php
                                    $tmp_data = DB::table('data_petugas')->select('foto')->where('user_id', Auth::user()->id)->value('foto');
                                ?>
                                @if($tmp_data != null)
                                    <img src="{{ asset('foto_profil/'.$tmp_data) }}" />
                                @else
                                    <img src="{{ asset('foto_profil/default.png') }}" />
                                @endif
                            @elseif(Auth::user()->level==4)
                                <?php
                                    $tmp_data = DB::table('data_pengguna')->select('foto')->where('user_id', Auth::user()->id)->value('foto');
                                ?>
                                @if($tmp_data != null)
                                    <img src="{{ asset('foto_profil/'.$tmp_data) }}" />
                                @else
                                    <img src="{{ asset('foto_profil/default.png') }}" />
                                @endif
                            @else
                                <img src="{{ asset('foto_profil/default.png') }}" />
                            @endif
                        </div>

                        <a data-toggle="" href="#" class="">
                            <span>
                                <?php
                                    if(Auth::user()->level == 0){
                                        echo 'HALO Super Admin';
                                    }elseif(Auth::user()->level == 1){
                                        echo 'HALO Petugas Perizinan';
                                    }elseif(Auth::user()->level == 2){
                                        echo 'HALO Petugas Pajak';
                                    }elseif(Auth::user()->level == 3){
                                        echo 'HALO Petugas Akuntansi';
                                    }elseif(Auth::user()->level == 4){
                                        $tmp_name = DB::table('users')
                                        ->join('data_pengguna','users.id','=','data_pengguna.user_id')
                                        ->select('data_pengguna.nama_pengguna')
                                        ->where('users.id', Auth::user()->id)
                                        ->value('data_pengguna.nama_pengguna');
                                        if(count($tmp_name)>0){
                                            echo $tmp_name;
                                        }else{
                                            echo 'Lengkapi Data Diri';
                                        }
                                    }
                                ?>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @if(Auth::user()->level == 0)
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('petugas/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Petugas</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('jenispajak/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Jenis Pajak</p>
                        </a>
                    </li>
                </ul>
                @elseif(Auth::user()->level == 1)
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('pengaju/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Perizinan Pengaju</p>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ url('pumum/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Pengguna Umum</p>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{ url('dokumen/listKategori') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Dokumen</p>
                        </a>
                    </li>
                </ul>
                @elseif(Auth::user()->level == 2)
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pajak/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Omset</p>
                        </a>
                    </li>
                </ul>
                @elseif(Auth::user()->level == 3)
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pajak/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Omset</p>
                        </a>
                    </li>
                </ul>
                @elseif(Auth::user()->level == 4)
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('pumum/listProfil/'.Auth::user()->id) }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Kelola Profil</p>
                        </a>
                    </li>
                    <?php
                        $result = DB::table('users')
                        ->join('data_pengguna','users.id','=','data_pengguna.user_id')
                        ->select('data_pengguna.*')
                        ->where('users.id', Auth::user()->id)
                        ->first();
                    ?>
                    @if(count($result)>0)
                    <!-- <li>
                        <a href="{{ url('dokumen/listDokumen/'.Auth::user()->id) }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Kelola Dokumen</p>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{ url('usaha/listUsaha/'.Auth::user()->id) }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Kelola Data Usaha</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pajak/listPajak/'.Auth::user()->id) }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Omset</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pajak/listTunggakanPajak/'.Auth::user()->id) }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Tunggakan Pajak</p>
                        </a>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#Dashboard">
                            Sistem Perhitungan PPN
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                                    <i class="ti-settings"></i>
                                    <p class="hidden-md hidden-lg">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright pull-right">
                        &copy; <script>
                            document.write(new Date().getFullYear())

                        </script>, made with <i class="fa fa-heart heart"></i> by <a
                            href="https://www.compunerd.co.id/">Compunerd ID</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ asset('assets/js/es6-promise-auto.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ asset('assets/js/bootstrap-switch-tags.js') }}"></script>

<!-- Circle Percentage-chart -->
<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{ asset('assets/js/jquery-jvectormap.js') }}"></script>

<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script> -->

<!-- Wizard Plugin    -->
<script src="{{ asset('assets/js/jquery.bootstrap.wizard.min.js') }}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('assets/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

<!--   Sharrre Library    -->
<script src="{{ asset('assets/js/jquery.sharrre.js') }}"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

<script>
    // Facebook Pixel Code Don't Delete
    ! function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

    try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

    } catch (err) {
        console.log('Facebook Track Error:', err);
    }

</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
</noscript>



<script type="text/javascript">
    $(document).ready(function () {
        demo.initOverviewDashboard();
        demo.initCirclePercentage();

    });

</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

    });


    $(document).ready(function () {

        $('#datatables2').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

    });

    $(document).ready(function () {

        $('#datatables3').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

    });

    $(document).ready(function () {

        $('#datatables4').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

    });

</script>
<script type="text/javascript">
    $().ready(function () {
        demo.checkFullPageBackgroundImage();

        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initWizard();
    });

</script>
