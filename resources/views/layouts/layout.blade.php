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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
                            <img src="{{ asset('assets/img/faces/face-2.jpg') }}" />
                        </div>

                        <a data-toggle="" href="#" class="">
                            <span>
                                HALO
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-bar-chart-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pengaju/index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Data Pengajuan</p>
                        </a>
                    </li>
                </ul>
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
