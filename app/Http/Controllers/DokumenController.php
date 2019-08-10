<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\PenggunaUmum;
use App\Mail\NotifikasiRevisiDokumenMail;
use Illuminate\Support\Facades\Mail;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Dokumen::get();
        return view('dokumen.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = PenggunaUmum::where('user_id',$id)->first();
        return view('dokumen.form_tambah')
        ->with('data', $data);
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
            if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="csv" || $file->getClientOriginalExtension()=="xls"){
                $name=("dokumen".time()).".".$file->getClientOriginalExtension();
                $file->move('dokumen_pengguna',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        $user_id=$request->input('user_id');
        $nama_dokumen=$request->input('nama_dokumen');
        $dokumen=$request->input('dokumen');
        $data=new Dokumen();
        $data->user_id = $user_id;
        $data->nama_dokumen = $nama_dokumen;
        $data->dokumen = $berkas;
        if($data->save()){
            return redirect('dokumen/create/'.$user_id)
            ->with(['success' => 'Data berhasil disimpan']);
        }else{
            return redirect('dokumen/create/'.$user_id)
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
        $data = Dokumen::find($id);
        return view('dokumen.detail')
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
        $data = Dokumen::find($id);
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
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="csv" || $file->getClientOriginalExtension()=="xls"){
                $name=("dokumen".time()).".".$file->getClientOriginalExtension();
                $file->move('dokumen_pengguna',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        $status = "telah revisi";
        $nama_dokumen=$request->input('nama_dokumen');
        $dokumen=$request->input('dokumen');
        $data = Dokumen::where('id_dokumen',$id)->first();
        $data->nama_dokumen = $nama_dokumen;
        $data->dokumen = $berkas;
        $data->status = $status;
        if($data->save()){
            return redirect('dokumen/listDokumen/'. $data['user_id'])
            ->with(['success' => 'Data berhasil diubah']);
        }else{
            return redirect('dokumen/listDokumen/'. $data['user_id'])
            ->with(['error' => 'Data gagal diubah']);
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
        $tmp_id = Dokumen::where('id_dokumen',$id)->value('user_id');
        $data = Dokumen::find($id);
        if($data->delete()){
            return redirect('dokumen/listDokumen/'. $tmp_id)
            ->with(['success' => 'Data berhasil dihapus']);
        }else{
            return redirect('dokumen/listDokumen/'. $tmp_id)
            ->with(['error' => 'Data gagal dihapus']);
        }
    }

    public function listDokumen($id)
    {
        $data = Dokumen::where('user_id',$id)->get();
        $data2 = PenggunaUmum::where('user_id',$id)->first();
        return view('dokumen.list')
        ->with('data', $data)
        ->with('data2', $data2);

        // print_r($data2);
    }

    public function downloadDokumen($id){
        $data=Dokumen::find($id);
        $pathToFile='/dokumen_pengguna'.'/'.$data->dokumen;
        return response()->download(public_path($pathToFile));
    }

    //Mengirimkan feedback revisi dokumen
    public function revisiDokumen($id)
    {
        $status="revisi";
        $data = Dokumen::where('id_dokumen',$id)->first();
        $data->status = $status;
        $tmp_email = PenggunaUmum::where('user_id',$data['user_id'])->value('email');
        if($data->save()){
            Mail::to($tmp_email)->send(new NotifikasiRevisiDokumenMail($data));
            return redirect('dokumen/listDokumen/'. $data['user_id'])
            ->with(['success' => 'Permintaan revisi berhasil dikirim kepada pengaju']);;
        }else{
            return redirect('dokumen/listDokumen/'. $data['user_id'])
            ->with(['error' => 'Permintaan revisi gagal dikirim kepada pengaju']);
        }
    }

     //Mengirimkan feedback accept dokumen
     public function acceptDokumen($id)
     {
         $status="accept";
         $data = Dokumen::where('id_dokumen',$id)->first();
         $data->status = $status;
         if($data->save()){
             return redirect('dokumen/listDokumen/'. $data['user_id'])
             ->with(['success' => 'Dokumen telah diterima']);;
         }else{
             return redirect('dokumen/listDokumen/'. $data['user_id'])
             ->with(['error' => 'Dokumen gagal diterima']);
         }
     }
}
