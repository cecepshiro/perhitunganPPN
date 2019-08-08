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
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <!-- <form method="#" action="#"> -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">
                                    <h3 class="card-title">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" placeholder="Enter email" autofocus
                                            class="form-control input-no-border">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password"
                                            class="form-control input-no-border">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ url('pengaju/create') }}">Daftarkan Izin Usaha</a>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Login</button>
                                </div>
                            </div>
                        </form>
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
