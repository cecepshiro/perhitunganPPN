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
                        <form method="POST" action="{{ url('pengaju/saveRevisi/') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">
                                    <h3 class="card-title">Revisi Pengajuan</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Keterangan Dokumen</label>
                                        <input type="text" name="dokumen" placeholder="Masukan keterangan"   value="{{ $data->dokumen }}" required autofocus
                                            class="form-control input-no-border">
                                        <input type="hidden" name="id_pengaju" value="{{ $data->id_pengaju }}" class="form-control input-no-border">
                                        <input type="hidden" name="id_detail_pengaju" value="{{ $data->id_detail_pengaju }}" class="form-control input-no-border">
                                    </div>
                                    <div class="form-group">
                                        <label>Dokumen</label>
                                        <input type="file" name="file" placeholder="Masukan dokumen"
                                            class="form-control input-no-border" accept="image/jpg, image/jpeg, image/png, .docx, .pdf, .csv, .xls">
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Simpan</button>
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
