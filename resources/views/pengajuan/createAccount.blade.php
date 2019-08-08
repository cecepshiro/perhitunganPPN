@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('pengaju/storeAccount') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card-header">
                        <h4 class="card-title">
                            Registrasi Pengguna Umum
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" placeholder="" value="{{ $data['email'] }}" name="email" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="" value="adminadmin" name="password" readonly class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-success">Buat Akun</button>
                        <a href="{{ url('pengaju/index') }}" class="btn btn-fill btn-danger">Batal</a>
                    </div>
                </form>
            </div> <!-- end card -->
        </div> <!--  end col-md-6  -->
    </div> <!-- end row -->
</div>
@endsection
