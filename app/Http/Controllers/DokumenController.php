<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\DetailDokumen;
use App\PenggunaUmum;
use App\Mail\NotifikasiRevisiDokumenMail;
use App\Mail\NotifikasiAcceptDokumenMail;
use Illuminate\Support\Facades\Mail;
use Auth;

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

        //upload file
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="csv" || $file->getClientOriginalExtension()=="xls"){
                $name=("dokumen".time()).".".$file->getClientOriginalExtension();
                $file->move('dokumen_pengguna',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }


        //kode otomatis
        //untuk urutan kode dibalakang
        $query = Dokumen::select('RIGHT(dokumen.id_dokumen,8) as kode', FALSE)->orderBy('id_dokumen','DESC')->limit(1)->count();
       
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
        $result = 'DK'.$kodemax;


        $user_id=$request->input('user_id');
        $id_dokumen=$result;
        $nama_dokumen=$request->input('nama_dokumen');
        $dokumen=$request->input('dokumen');
        $data=new Dokumen();
        $data->id_dokumen = $id_dokumen;
        $data->user_id = $user_id;
        if($data->save()){
            $data2=new DetailDokumen();
            $data2->id_dokumen = $id_dokumen;
            $data2->nama_dokumen = $nama_dokumen;
            $data2->dokumen = $berkas;
            $data2->save();
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
        $data = DetailDokumen::where('id_detail_dokumen',$id)->first();
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

     //menyimpan data dokumen baru yang telah direvisi
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
        $status2 = "revisi dikonfirmasi";
        $id_dokumen=$request->input('id_dokumen');
        $id_detail_dokumen=$request->input('id_detail_dokumen');
        $nama_dokumen=$request->input('nama_dokumen');
        $dokumen=$request->input('dokumen');
        $data = DetailDokumen::where('id_detail_dokumen',$id_detail_dokumen)->first();
        $data->status = $status;
        if($data->save()){
            $data2 = new DetailDokumen();
            $data2->id_dokumen = $id_dokumen;
            $data2->nama_dokumen = $nama_dokumen;
            $data2->dokumen = $berkas;
            $data2->status = $status2;
            $data2->save();
            return redirect('dokumen/listDokumen/'. Auth::user()->id)
            ->with(['success' => 'Data berhasil diubah']);
        }else{
            return redirect('dokumen/listDokumen/'. Auth::user()->id)
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
        $data2 = DetailDokumen::where('id_dokumen',$id)->delete();
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
        $data = Dokumen::getDetailDokumen($id);
        $data2 = PenggunaUmum::where('user_id',$id)->first();
        $data3 = DetailDokumen::getJumlahData($id);
        return view('dokumen.list')
        ->with('data', $data)
        ->with('data2', $data2)
        ->with('data3', $data3);

        // print_r($data2);
    }

    public function downloadDokumen($id){
        $data=DetailDokumen::where('id_dokumen',$id)->first();
        $pathToFile='/dokumen_pengguna'.'/'.$data->dokumen;
        return response()->download(public_path($pathToFile));
    }

    //Mengirimkan feedback revisi dokumen
    public function revisiDokumen($id)
    {
        $status="revisi";
        $data = DetailDokumen::where('id_detail_dokumen',$id)->first();
        $data->status = $status;
        $tmp_id_dok = $data['id_dokumen'];
        $data2 = DetailDokumen::getDataEmailDokumen($tmp_id_dok);
        $tmp_email = PenggunaUmum::where('user_id',$data2->user_id)->value('email');
        $data3 = Dokumen::find($tmp_id_dok);
        if($data->save()){
            Mail::to($tmp_email)->send(new NotifikasiRevisiDokumenMail($data3));
            return redirect('dokumen/listDokumen/'. $data2->user_id)
            ->with(['success' => 'Permintaan revisi berhasil dikirim kepada pengaju']);;
        }else{
            return redirect('dokumen/listDokumen/'. $data2->user_id)
            ->with(['error' => 'Permintaan revisi gagal dikirim kepada pengaju']);
        }
    }

    //Mengirimkan feedback revisi dokumen kembali
    public function revisiDokumenKembali($id)
    {
        $status="revisi";
        $data = DetailDokumen::where('id_detail_dokumen',$id)->first();
        $data->status = $status;
        $tmp_id_dok = $data['id_dokumen'];
        $data2 = DetailDokumen::getDataEmailDokumen($tmp_id_dok);
        $tmp_email = PenggunaUmum::where('user_id',$data2->user_id)->value('email');
        $data3 = Dokumen::find($tmp_id_dok);
        if($data->save()){
            Mail::to($tmp_email)->send(new NotifikasiRevisiDokumenMail($data3));
            return redirect('dokumen/listDokumen/'. $data2->user_id)
            ->with(['success' => 'Permintaan revisi berhasil dikirim kepada pengaju']);;
        }else{
            return redirect('dokumen/listDokumen/'. $data2->user_id)
            ->with(['error' => 'Permintaan revisi gagal dikirim kepada pengaju']);
        }

        //id dokumen
        // print_r($id);
    }

     //Mengirimkan feedback accept dokumen
     public function acceptDokumen($id)
     {
         $status="accept";
         $data = DetailDokumen::where('id_detail_dokumen',$id)->first();
         $data->status = $status;
         $tmp_id_dok = $data['id_dokumen'];
         $data2 = DetailDokumen::getDataEmailDokumen($tmp_id_dok);
         $data3 = PenggunaUmum::where('user_id',$data2->user_id)->first();
         $tmp_email = $data3['email'];
         $data4 = Dokumen::find($tmp_id_dok);
         if($data->save()){
            Mail::to($tmp_email)->send(new NotifikasiAcceptDokumenMail($data4));
             return redirect('dokumen/listDokumen/'. $data2->user_id)
             ->with(['success' => 'Dokumen telah diterima']);;
         }else{
             return redirect('dokumen/listDokumen/'. $data2->user_id)
             ->with(['error' => 'Dokumen gagal diterima']);
         }
     }

     public function logDokumen($id)
    {
        $data = DetailDokumen::where('id_dokumen',$id)->get();
        $tmp_id_dok = DetailDokumen::where('id_dokumen',$id)->value('id_dokumen');
        return view('dokumen.log_dokumen')
        ->with('data', $data)
        ->with('tmp_id_dok', $tmp_id_dok);
    }
}
