<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets_login/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets_login/img/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Perhitungan PPN</title>

	<!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-pro') }}"/>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->

    <!--  Paper Dashboard core CSS    -->

	<link href="{{ asset('assets_login/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets_login/css/paper-dashboard.css') }}" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="{{ asset('assets_login/css/demo.css') }}" rel="stylesheet" /> -->


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets_login/css/themify-icons.css') }}" rel="stylesheet">
</head>

<body>
        @yield('content')
</body>

	<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
	<script src="{{ asset('assets_login/js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets_login/js/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets_login/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets_login/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src="{{ asset('assets_login/js/jquery.validate.min.js') }}"></script>

	<!-- Promise Library for SweetAlert2 working on IE -->
	<script src="{{ asset('assets_login/js/es6-promise-auto.min.js') }}"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="{{ asset('assets_login/js/moment.min.js') }}"></script>

	<!--  Date Time Picker Plugin is included in this js file -->
	<script src="{{ asset('assets_login/js/bootstrap-datetimepicker.js') }}"></script>

	<!--  Select Picker Plugin -->
	<script src="{{ asset('assets_login/js/bootstrap-selectpicker.js') }}"></script>

	<!--  Switch and Tags Input Plugins -->
	<script src="{{ asset('assets_login/js/bootstrap-switch-tags.js') }}"></script>

	<!-- Circle Percentage-chart -->
	<script src="{{ asset('assets_login/js/jquery.easypiechart.min.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('assets_login/js/chartist.min.js') }}"></script>

	<!--  Notifications Plugin    -->
	<script src="{{ asset('assets_login/js/bootstrap-notify.js') }}"></script>

	<!-- Sweet Alert 2 plugin -->
	<script src="{{ asset('assets_login/js/sweetalert2.js') }}"></script>

	<!-- Vector Map plugin -->
	<script src="{{ asset('assets_login/js/jquery-jvectormap.js') }}"></script>

	<!--  Google Maps Plugin    -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script> -->

	<!-- Wizard Plugin    -->
	<script src="{{ asset('assets_login/js/jquery.bootstrap.wizard.min.js') }}"></script>

	<!--  Bootstrap Table Plugin    -->
	<script src="{{ asset('assets_login/js/bootstrap-table.js') }}"></script>

	<!--  Plugin for DataTables.net  -->
	<script src="{{ asset('assets_login/js/jquery.datatables.js') }}"></script>

	<!--  Full Calendar Plugin    -->
	<script src="{{ asset('assets_login/js/fullcalendar.min.j') }}s"></script>

	<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets_login/js/paper-dashboard.js') }}"></script>

	<!--   Sharrre Library    -->
    <script src="{{ asset('assets_login/js/jquery.sharrre.js') }}"></script>

	<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
	<!-- <script src="{{ asset('assets_login/js/demo.js"></script> -->

	<script type="text/javascript">
        $().ready(function(){
            demo.checkFullPageBackgroundImage();

            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
	</script>

</html>
