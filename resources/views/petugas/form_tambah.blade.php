@extends('layouts.layout')
@section('content')
<div class="container-fluid">
<div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card card-wizard" id="wizardCard">
                            <form id="wizardForm" method="POST" action="{{ url('petugas/simpan') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="card-header text-center">
                                    <h4 class="card-title">Pendaftaran Petugas</h4>
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
                                        <li><a href="#tab1" data-toggle="tab">Data Akun</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Biodata Lengkap</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <h5 class="text-center">Masukan biodata petugas.</h5>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Nama Petugas
                                                        </label>
                                                        <input class="form-control" type="text" name="nama_petugas" required
                                                            placeholder="Masukan nama petugas" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Bagian
                                                        </label>
                                                        <select class="form-control"  name="bagian" required placeholder="Masukan bagian petugas">
                                                            <option value="">PILIH BAGIAN</option>
                                                            <option value="1">Bagian Perizinan</option>
                                                            <option value="2">Bagian Pajak</option>
                                                            <option value="3">Bagian Akutansi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Email<star>*</star>
                                                        </label>
                                                        <input class="form-control" type="text" name="email" required
                                                            email="true" placeholder="Masukan email petugas" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Password (default)
                                                        </label>
                                                        <input class="form-control" type="password" readonly name="password" required
                                                            value="adminadmin" placeholder="Masukan password petugas" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h5 class="text-center">Isi Data Diri Lengkap Petugas.
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Tempat Lahir
                                                        </label>
                                                        <input class="form-control" type="text" name="tempat_lahir" required
                                                            placeholder="Masukan nama petugas" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Tanggal Lahir
                                                        </label>
                                                        <input class="form-control" type="date" name="tanggal_lahir" required
                                                            placeholder="Masukan nama petugas" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Jenis Kelamin
                                                        </label>
                                                        <select option class="form-control" name="jk" required>
                                                            <option value="">PILIH JK</option>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            No. Telepon
                                                        </label>
                                                        <input class="form-control" type="text" name="no_telp" required
                                                            placeholder="Masukan no telepon petugas" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Alamat
                                                        </label>
                                                        <textarea class="form-control" name="alamat" required
                                                            placeholder="Masukan alamat petugas"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            Foto Profil
                                                        </label>
                                                        <input class="form-control" type="file" name="file" required
                                                            accept="image/jpg, image/png, image/jpeg"  placeholder="Masukan foto petugas" />
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
@endsection
