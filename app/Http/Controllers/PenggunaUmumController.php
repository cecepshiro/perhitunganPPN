<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenggunaUmum;

class PenggunaUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PenggunaUmum::get();
        return view('pengguna_umum.home')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna_umum.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=$request->input('user_id');
        $nama_pengguna=$request->input('nama_pengguna');
        $tempat_lahir=$request->input('tempat_lahir');
        $tanggal_lahir=$request->input('tanggal_lahir');
        $jenis_kelamin=$request->input('jenis_kelamin');
        $no_telp=$request->input('no_telp');
        $alamat=$request->input('alamat');
        $foto=$request->input('foto');
        $data=new PenggunaUmum();
        $data->user_id = $user_id;
        $data->nama_pengguna = $nama_pengguna;
        $data->tempat_lahir = $tempat_lahir;
        $data->tanggal_lahir = $tanggal_lahir;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->no_telp = $no_telp;
        $data->alamat = $alamat;
        $data->foto = $foto;
        $data->save();
        return redirect('pumum/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PenggunaUmum::find($id);
        return view('pengguna_umum.detail_pengguna')
        ->with('data', $data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PenggunaUmum::find($id);
        return view('pengguna_umum.form_ubah')
        ->with('data', $data)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $nama_pengguna=$request->input('nama_pengguna');
        $tempat_lahir=$request->input('tempat_lahir');
        $tanggal_lahir=$request->input('tanggal_lahir');
        $jenis_kelamin=$request->input('jenis_kelamin');
        $no_telp=$request->input('no_telp');
        $alamat=$request->input('alamat');
        $foto=$request->input('foto');
        $data = PenggunaUmum::where('id_pengguna',$id)->first();
        $data->nama_pengguna = $nama_pengguna;
        $data->tempat_lahir = $tempat_lahir;
        $data->tanggal_lahir = $tanggal_lahir;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->no_telp = $no_telp;
        $data->alamat = $alamat;
        $data->foto = $foto;
        $data->save();
        return redirect('pumum/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenggunaUmum::find($id)->delete();
        return redirect('pumum/index');
    }
}
