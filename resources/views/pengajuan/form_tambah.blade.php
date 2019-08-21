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
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card card-wizard" id="wizardCard">
                            <form id="wizardForm" method="POST" action="{{ url('pengaju/simpan') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-header text-center">
                                    <h4 class="card-title">Pengajuan Akun</h4>
                                    <p class="category">Lengkapi data berikut</p>
                                </div>
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
                                    <ul class="nav">
                                        <li><a href="#tab1" data-toggle="tab">Biodata</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Upload Izin Usaha</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <h5 class="text-center">Masukan biodata anda.</h5>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Nama Pengaju<star>*
                                                            </star>
                                                        </label>
                                                        <input class="form-control" type="text" name="nama_pengaju"
                                                            required="true" value="{{ old('nama_pengaju') }}" placeholder="Masukan nama pengaju" />
                                                        @if ($errors->has('nama_pengaju'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('nama_pengaju') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            No. NPWP<star>*
                                                            </star>
                                                        </label>
                                                        <input class="form-control" type="text" name="npwp"
                                                            maxlength="15" required="true" value="{{ old('npwp') }}" placeholder="Masukan no npwp"
                                                            onkeypress="return isNumberKey(event)" />
                                                        @if ($errors->has('npwp'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('npwp') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Email<star>*</star>
                                                        </label>
                                                        <input class="form-control" type="text" name="email"
                                                            required="true" email="true"
                                                            placeholder="Masukan email pengaju" value="{{ old('email') }}"/>
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h5 class="text-center">Upload bukti izin usaha anda.
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">Instansi (Perusahaan / Individu)<star>*</star></label>
                                                        <input class="form-control" autofocus type="text"
                                                            name="instansi" required="true" value="{{ old('instansi') }}"
                                                            placeholder="Masukan nama usaha" />
                                                        @if ($errors->has('instansi'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('instansi') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Keterangan Dokumen<star>*
                                                            </star>
                                                        </label>
                                                        <input class="form-control" type="text" name="dokumen"
                                                            required="true" value="{{ old('keterangan') }}" placeholder="Masukan keterangan dokumen" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Berkas Bukti Izin Usaha<star>*
                                                            </star></label>
                                                        <input class="form-control" type="file" name="file"
                                                            required="true" accept="image/jpg, image/png, .docx, .pdf"
                                                            placeholder="Masukan bukti izin usaha" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button"
                                        class="btn btn-default btn-fill btn-wd btn-back pull-left">Kembali</button>
                                    <button type="button"
                                        class="btn btn-info btn-fill btn-wd btn-next pull-right">Selanjutnya</button>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd btn-finish pull-right"
                                        onclick="onFinishWizard()">Simpan</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
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
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

</script>
@endsection
