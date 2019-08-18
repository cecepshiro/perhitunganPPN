@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    @if($data['nama_pengguna'] == null)
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('assets/img/background.jpg') }}" alt="..." />
                </div>
                <div class="card-content">
                    <div class="author">
                        <?php
                            $tmp_data = DB::table('data_pengguna')->select('foto')->where('user_id', Auth::user()->id)->value('foto');
                        ?>
                        @if($tmp_data != null)
                            <img src="{{ asset('foto_profil/'.$tmp_data) }}" class="avatar border-white"/>
                        @else
                            <img src="{{ asset('foto_profil/default.png') }}" class="avatar border-white"/>
                        @endif
                        <h4 class="card-title">Isi terlebih dahulu profil diri anda<br />
                            <a href="#"><small></small></a>
                        </h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card">
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profil</h4>
                </div>
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control border-input" readonly name="instansi"
                                        placeholder="Masukan nama instansi" value="{{ $data2->instansi }}">
                                    <input type="hidden" class="form-control border-input" readonly name="user_id"
                                        placeholder="Masukan nama bidang usaha" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control border-input" disabled autofocus
                                        name="nama_pengguna" value="Kosong" placeholder="Masukan nama pengguna">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control border-input" disabled name="email"
                                        value="Kosong" placeholder="Masukan alamat email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-input" disabled name="tempat_lahir"
                                        placeholder="Masukan tempat lahir" value="Kosong">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control border-input" disabled name="tanggal_lahir"
                                        placeholder="Masukan tanggal lahir" value="Kosong">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" disabled name="jenis_kelamin" id="radio1" value="L" checked>
                                        <label for="radio1">Laki-Laki</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" disabled name="jenis_kelamin" id="radio1" value="P">
                                        <label for="radio1">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control border-input" disabled name="no_telp"
                                        placeholder="Masukan no telepon" value="Kosong">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="5" class="form-control border-input" disabled name="alamat"
                                        placeholder="Masukan alamat lengkap">Kosong</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('pumum/create/'.Auth::user()->email) }}"
                                class="btn btn-info btn-fill btn-wd">Update Profil</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @elseif($data['nama_pengguna'] != null)
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('assets/img/background.jpg') }}" alt="..." />
                </div>
                <div class="card-content">
                    <div class="author">
                        <?php
                            $tmp_data = DB::table('data_pengguna')->select('foto')->where('user_id', Auth::user()->id)->value('foto');
                        ?>
                        <img src="{{ asset('foto_profil/'.$tmp_data) }}" class="avatar border-white"/>
                        <h4 class="card-title">{{ $data['nama_pengguna'] }}<br />
                            <a href="#"><small>{{ $data['email'] }}</small></a>
                        </h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card">
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profil</h4>
                </div>
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control border-input" readonly name="instansi"
                                        placeholder="Masukan nama instansi" value="{{ $data2->instansi }}">
                                    <input type="hidden" class="form-control border-input" readonly name="user_id"
                                        placeholder="Masukan nama bidang usaha" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control border-input" disabled autofocus
                                        name="nama_pengguna" value="{{ $data['nama_pengguna'] }}"
                                        placeholder="Masukan nama pengguna">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control border-input" disabled name="email"
                                        value="{{ $data['email'] }}" placeholder="Masukan alamat email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-input" disabled name="tempat_lahir"
                                        placeholder="Masukan tempat lahir" value="{{ $data['tempat_lahir'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control border-input" disabled name="tanggal_lahir"
                                        placeholder="Masukan tanggal lahir" value="{{ $data['tanggal_lahir'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" disabled name="jenis_kelamin" id="radio1" value="L" checked>
                                        <label for="radio1">Laki-Laki</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" disabled name="jenis_kelamin" id="radio1" value="P">
                                        <label for="radio1">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control border-input" disabled name="no_telp"
                                        placeholder="Masukan no telepon" value="{{ $data['tanggal_lahir'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="5" class="form-control border-input" disabled name="alamat"
                                        placeholder="Masukan alamat lengkap">{{ $data['alamat'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('pumum/edit/'.Auth::user()->email) }}"
                                class="btn btn-info btn-fill btn-wd">Update Profil</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
