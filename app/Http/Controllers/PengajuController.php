<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaju;
use App\Mail\NotifikasiPengajuanMail;
use Illuminate\Support\Facades\Mail;

class PengajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Pengaju::get();
        return view('pengajuan.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="docx"){
                $name=("izin_usaha".time()).".".$file->getClientOriginalExtension();
                $file->move('berkas_izin_usaha',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        
        $nama_pengaju=$request->input('nama_pengaju');
        $npwp=$request->input('npwp');
        $email=$request->input('email');
        $nama_usaha=$request->input('nama_usaha');
        $data=new Pengaju();
        $data->nama_pengaju = $nama_pengaju;
        $data->no_npwp = $npwp;
        $data->email = $email;
        $data->nama_usaha = $nama_usaha;
        $data->path_dokumen = $berkas;
        if($data->save()){
            return redirect('pengaju/create')
            ->with(['success' => 'Pengajuan berhasil dikirim']);
        }else{
            return redirect('pengaju/create')
            ->with(['error' => 'Pengajuan gagal dikirim']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengaju::find($id);
        return view('dokumen.detail_dokumen')
        ->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengaju::find($id);
        return view('dokumen.form_ubah')
        ->with('data', $data);
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
        $nama_pengaju=$request->input('nama_pengaju');
        $email=$request->input('email');
        $path_dokumen=$request->input('path_dokumen');
        $status=$request->input('status');
        $data = Pengaju::where('id_dokumen',$id)->first();
        $data->nama_pengaju = $nama_pengaju;
        $data->email = $email;
        $data->path_dokumen = $path_dokumen;
        $data->status = $status;
        $data->save();
        return redirect('pengaju/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaju::find($id)->delete();
        return redirect('pengaju/index');
    }

    public function mail(){
        Mail::to("tes@admin.com")->send(new NotifikasiPengajuanMail());
		return "Email telah dikirim";
    }
}