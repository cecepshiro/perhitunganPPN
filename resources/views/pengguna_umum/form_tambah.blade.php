@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    @if(count($data2) == 0)
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('assets/img/background.jpg') }}" alt="..." />
                </div>
                <div class="card-content">
                    <div class="author">
                        <img class="avatar border-white" src="../../assets/img/faces/face-2.jpg" alt="..." />
                        <h4 class="card-title">Chet Faker<br />
                            <a href="#"><small>@chetfaker</small></a>
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
                    <form action="{{ url('pumum/simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bidang Usaha</label>
                                    <input type="text" class="form-control border-input" readonly name="nama_usaha"
                                        placeholder="Masukan nama bidang usaha" value="{{ $data->nama_usaha }}">
                                    <input type="hidden" class="form-control border-input" readonly name="user_id"
                                        placeholder="Masukan nama bidang usaha" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control border-input" required autofocus name="nama_pengguna" value="{{ $data->nama_pengaju }}"
                                        placeholder="Masukan nama pengguna">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control border-input" required name="email" value="{{ $data->email }}"
                                        placeholder="Masukan alamat email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-input" required name="tempat_lahir"
                                        placeholder="Masukan tempat lahir" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control border-input" required name="tanggal_lahir"
                                        placeholder="Masukan tanggal lahir" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="jenis_kelamin" id="radio1" value="L" checked>
                                        <label for="radio1">Laki-Laki</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="jenis_kelamin" id="radio1" value="P">
                                        <label for="radio1">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control border-input" required name="no_telp"
                                        placeholder="Masukan no telepon" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="5" class="form-control border-input" required name="alamat"
                                        placeholder="Masukan alamat lengkap" value=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Foto Profil</label>
                                    <input type="file" class="form-control border-input" required name="file"
                                    accept="image/jpg, image/png, image/jpeg" placeholder="Masukan foto profil" value="">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profil</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @elseif(count($data2) != 0)
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('assets/img/background.jpg') }}" alt="..." />
                </div>
                <div class="card-content">
                    <div class="author">
                        <img class="avatar border-white" src="../../assets/img/faces/face-2.jpg" alt="..." />
                        <h4 class="card-title">{{ $data2->nama_pengguna }}<br />
                            <a href="#"><small>{{ $data2->email }}</small></a>
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
                    <form action="{{ url('pumum/simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bidang Usaha</label>
                                    <input type="text" class="form-control border-input" readonly name="nama_usaha"
                                        placeholder="Masukan nama bidang usaha" value="{{ $data->nama_usaha }}">
                                    <input type="hidden" class="form-control border-input" readonly name="user_id"
                                        placeholder="Masukan nama bidang usaha" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control border-input" required autofocus name="nama_pengguna" value="{{ $data2->nama_pengguna }}"
                                        placeholder="Masukan nama pengguna">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control border-input" required readonly name="email" value="{{ $data2->email }}"
                                        placeholder="Masukan alamat email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-input" required name="tempat_lahir"
                                        placeholder="Masukan tempat lahir" value="{{ $data2->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control border-input" required name="tanggal_lahir"
                                        placeholder="Masukan tanggal lahir" value="{{ $data2->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="jenis_kelamin" id="radio1" value="L" checked>
                                        <label for="radio1">Laki-Laki</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="jenis_kelamin" id="radio1" value="P">
                                        <label for="radio1">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control border-input" required name="no_telp"
                                        placeholder="Masukan no telepon" value="{{ $data2->no_telp }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="5" class="form-control border-input" required name="alamat"
                                        placeholder="Masukan alamat lengkap">{{ $data2->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Foto Profil</label>
                                    <input type="file" class="form-control border-input" required name="file"
                                    accept="image/jpg, image/png, image/jpeg" placeholder="Masukan foto profil" value="">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profil</button>
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
