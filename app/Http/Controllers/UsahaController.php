<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usaha;
use Auth;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Usaha::get();
        return view('usaha.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usaha.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kode otomatis
        //untuk urutan kode dibalakang
        $query = Usaha::select('RIGHT(data_usaha.id_usaha,8) as kode', FALSE)->orderBy('id_usaha','DESC')->limit(1)->count();
       
        if($query <> 0){      
            //jika kode ternyata sudah ada.      
            $data = $query;      
            $kode = intval($data) + 1;  
           }
        else {      
            //jika kode belum ada      
             $kode = 1;    
        }
        $kodemax = str_pad($kode, 8, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        //generate kode
        $result = 'UH'.$kodemax;

        $id_usaha=$result;
        $user_id=$request->input('user_id');
        $nama_usaha=$request->input('nama_usaha');
        $keterangan=$request->input('keterangan');
        $data=new Usaha();
        $data->id_usaha = $id_usaha;
        $data->user_id = $user_id;
        $data->nama_usaha = $nama_usaha;
        $data->keterangan = $keterangan;
        if($data->save()){
            return redirect('usaha/listUsaha/'.Auth::user()->id)
            ->with(['success' => 'Data usaha berhasil disimpan']);
        }else{
            return redirect('usaha/listUsaha/'.Auth::user()->id)
            ->with(['error' => 'Data usaha gagal disimpan']);
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
        $data = Usaha::find($id);
        return view('usaha.detail')
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
        $data = Usaha::find($id);
        return view('usaha.form_ubah')
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
        $nama_usaha=$request->input('nama_usaha');
        $keterangan=$request->input('keterangan');
        $data= Usaha::find($id);
        $data->nama_usaha = $nama_usaha;
        $data->keterangan = $keterangan;
        if($data->save()){
            return redirect('usaha/listUsaha/'.Auth::user()->id)
            ->with(['success' => 'Data usaha berhasil disimpan']);
        }else{
            return redirect('usaha/listUsaha/'.Auth::user()->id)
            ->with(['error' => 'Data usaha gagal disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Usaha::find($id)->first();
        if($data->save()){
            return redirect('usaha/index')
            ->with(['success' => 'Data usaha berhasil dihapus']);
        }else{
            return redirect('usaha/index')
            ->with(['error' => 'Data usaha gagal dihapus']);
        }
    }

    public function listUsaha($id)
    {
        $data = Usaha::where('user_id', $id)->get();
        return view('usaha/list')
        ->with('data', $data);
    }
}
