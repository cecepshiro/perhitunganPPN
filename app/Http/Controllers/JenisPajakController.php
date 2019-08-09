<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPajak;

class JenisPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisPajak::get();
        return view('jenis_pajak.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_pajak.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis_pajak=$request->input('jenis_pajak');
        $besar_pajak=$request->input('besar_pajak');
        $data=new JenisPajak();
        $data->jenis_pajak = $jenis_pajak;
        $data->besar_pajak = $besar_pajak;
        if($data->save()){
            return redirect('jenispajak/create')
            ->with(['success' => 'Data berhasil disimpan']);
        }else{
            return redirect('jenispajak/create')
            ->with(['error' => 'Data gagal disimpan']);
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
        $data = JenisPajak::find($id);
        return view('jenis_pajak.detail')
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
        $data = JenisPajak::find($id);
        return view('jenis_pajak.form_ubah')
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
        $jenis_pajak=$request->input('jenis_pajak');
        $besar_pajak=$request->input('besar_pajak');
        $data = JenisPajak::where('id_jenis_pajak',$id)->first();
        $data->jenis_pajak = $jenis_pajak;
        $data->besar_pajak = $besar_pajak;
        $data->save();
        return redirect('jenispajak/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisPajak::find($id);
        if($data->delete()){
            return redirect('jenispajak/index')
            ->with(['success' => 'Data berhasil dihapus']);
        }else{
            return redirect('jenispajak/index')
            ->with(['error' => 'Data gagal dihapus']);
        }
    }
}
