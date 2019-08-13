<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pajak;
use App\JenisPajak;
use App\Dokumen;
use Auth;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pajak::getStatusMenunggu();
        $data2 = Pajak::getStatusBelumBayar();
        $data3 = Pajak::getStatusSudahBayar();
        $data4 = Pajak::getStatusDikonfirmasi();
        return view('pajak.list_kategori')
        ->with('data', $data)
        ->with('data2', $data2)
        ->with('data3', $data3)
        ->with('data4', $data4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data2 = Dokumen::find($id);
        $data = JenisPajak::get();
        return view('pajak.form_tambah')
        ->with('data', $data)
        ->with('data2', $data2);
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
        $query = Pajak::select('RIGHT(data_pajak.id_pajak,8) as kode', FALSE)->orderBy('id_pajak','DESC')->limit(1)->count();
       
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
        $result = 'PK'.$kodemax;

        $id_pajak = $result;
        $user_id=Auth::user()->id;
        $id_dokumen=$request->input('id_dokumen');
        $omset=$request->input('omset');
        // $id_jenis_pajak=$request->input('id_jenis_pajak');
        $status='menunggu konfirmasi';
        $data = new Pajak();
        $data->id_pajak = $id_pajak;
        $data->id_dokumen = $id_dokumen;
        $data->user_id = $user_id;
        $data->omset = $omset;
        // $data->id_jenis_pajak = $id_jenis_pajak;
        $data->status = $status;
        if($data->save()){
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['success' => 'Data Omset Berhasil Dimasukan']);
        }else{
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['error' => 'Data Omset Gagal Dimasukan']);
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
        $data = Pajak::find($id);
        $data2 = JenisPajak::where('id_jenis_pajak', $data['id_jenis_pajak'])->first();
        return view('pajak.detail')
        ->with('data', $data)
        ->with('data2', $data2);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pajak::find($id);
        return view('pajak.form_ubah')
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
        // $user_id=$request->input('user_id');
        $omset=$request->input('omset');
        $id_jenis_pajak=$request->input('id_jenis_pajak');
        $status='belum terbayar';
        $data = new Pajak();
        // $data->user_id = $user_id;
        $data->omset = $omset;
        $data->id_jenis_pajak = $id_jenis_pajak;
        $data->status = $status;
        if($data->save()){
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['success' => 'Data omset berhasil diubah']);
        }else{
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['error' => 'Data omset berhasil diubah']);
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
        $data = Pajak::find($id)->first();
        if($data->delete()){
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['success' => 'Data omset berhasil dihapus']);
        }else{
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['error' => 'Data omset berhasil dihapus']);
        }
    }

    public function listPajak($id)
    {
        $data = Pajak::where('user_id', $id)->get();
        return view('pajak.list')
        ->with('data', $data);
    }

    public function konfirmasiBesaran($id)
    {
        $data = Pajak::find($id);
        $jenispajak = JenisPajak::get();
        return view('pajak.form_konfirmasi')
        ->with('data', $data)
        ->with('jenispajak', $jenispajak);
    }

    public function saveBesaran(Request $request, $id)
    {
        
        $id_jenis_pajak=$request->input('id_jenis_pajak');
        $status = 'belum terbayar';
        $data2 = JenisPajak::find($id_jenis_pajak); 
        $tmp_jenis_pajak = $data2['besar_pajak'];
        $data = Pajak::where('id_pajak',$id)->first();
        $data->status = $status;
        $data->id_jenis_pajak = $id_jenis_pajak;
        $result = (($data['omset'] * $tmp_jenis_pajak) / 100);
        $data->bayaran = $result;
        if($data->save()){
            return redirect('pajak/index/')
            ->with(['success' => 'Jenis pajak berhasil ditentukan, invoice dikirim']);
        }else{
            return redirect('pajak/index/')
            ->with(['error' => 'Jenis pajak gagal ditentukan']);
        }
    }

    //Form upload bukti bayar 
    public function formUploadBukti($id)
    {
        $data = Pajak::find($id);
        return view('pajak.formUpload')
        ->with('data', $data);
    }

    //simpan bukti bayar
    public function uploadBukti(Request $request, $id)
    {
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="csv" || $file->getClientOriginalExtension()=="xls"){
                $name=("bukti_bayar".time()).".".$file->getClientOriginalExtension();
                $file->move('bukti_bayar',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        $status = 'sudah terbayar';
        $data  = Pajak::where('id_pajak',$id)->first();
        $data->bukti_bayar = $berkas;
        $data->status = $status;
        if($data->save()){
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['success' => 'Bukti bayar telah diupload, tunggu konfirmasi petugas']);
        }else{
            return redirect('pajak/listPajak/'.Auth::user()->id)
            ->with(['error' => 'Bukti bayar gagal diupload']);
        }
    }

    //Form konfirmasi bukti bayar 
    public function formKonfirmasiBukti($id)
    {
        $data = Pajak::find($id);
        $data2 = JenisPajak::where('id_jenis_pajak', $data['id_jenis_pajak'])->first();
        return view('pajak.formKonfirmasiBukti')
        ->with('data', $data)
        ->with('data2', $data2);
    }   

    //konfirmasi bukti bayar 
    public function konfirmasiBukti(Request $request, $id)
    {
        $status = 'pembayaran dikonfirmasi';
        $data  = Pajak::where('id_pajak',$id)->first();
        $data->status = $status;
        if($data->save()){
            return redirect('pajak/index/')
            ->with(['success' => 'Bukti bayar dikonfirmasi']);
        }else{
            return redirect('pajak/index/')
            ->with(['error' => 'Bukti bayar gagal dikonfirmasi']);
        }
    }   

    //download bukti bayar 
    public function downloadBuktiBayar($id)
    {
        $data=Pajak::where('id_pajak',$id)->first();
        $pathToFile='/bukti_bayar'.'/'.$data->bukti_bayar;
        return response()->download(public_path($pathToFile));
    }   

}
