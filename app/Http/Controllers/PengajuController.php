<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaju;
use App\DetailPengaju;
use App\User;
use DB;
use App\PenggunaUmum;
use App\Mail\NotifikasiPengajuanMail;
use App\Mail\NotifikasiRevisiMail;
use App\Mail\NotifikasiDataAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Pengajuan diterima
    public function index()
    {
        $data=Pengaju::getPengajuanAccept();
        $data2=Pengaju::getPengajuanPending();
        $data3=Pengaju::getPengajuanRevisi();
        $data4=Pengaju::getPengajuanTelahRevisi();
        return view('pengajuan.list')
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
        $validator = Validator::make(request()->all(), [
            'nama_pengaju' => 'required|string',
            'npwp' => 'required|max:15',
            'email' => 'required|string|email|unique:data_pengaju',
            'instansi' => 'required'
        ]);
        if ($validator->fails()) {
             return redirect('pengaju/create')
             ->withErrors($validator->errors());
             
        }else{
            //upload berkas
            if($file=$request->file('file')){
                if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg"){
                    $name=("izin_usaha".time()).".".$file->getClientOriginalExtension();
                    $file->move('berkas_izin_usaha',$name);
                    $berkas=$name;
                }else{
                    return "Format tidak didukung";
                }
            }

            //kode otomatis
            //untuk urutan kode dibalakang
            $query = Pengaju::select('RIGHT(data_pengaju.id_pengaju,8) as kode', FALSE)->orderBy('id_pengaju','DESC')->limit(1)->count();
        
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
            $result = 'PJ'.$kodemax;
            
            $id_pengaju=$result;
            $nama_pengaju=$request->input('nama_pengaju');
            $npwp=$request->input('npwp');
            $email=$request->input('email');
            $instansi=$request->input('instansi');
            $dokumen=$request->input('dokumen');
            $data=new Pengaju();
            $data->id_pengaju = $id_pengaju;
            $data->nama_pengaju = $nama_pengaju;
            $data->no_npwp = $npwp;
            $data->email = $email;
            $data->instansi = $instansi;
            if($data->save()){
                $data2=new DetailPengaju();
                $data2->id_pengaju = $id_pengaju;
                $data2->dokumen = $dokumen;
                $data2->path_dokumen = $berkas;
                $data2->save();
                Mail::to($email)->send(new NotifikasiPengajuanMail($data));
                return redirect('pengaju/create')
                ->with(['success' => 'Permintaan pengajuan akun berhasil dikirim']);
            }else{
                return redirect('pengaju/create')
                ->with(['error' => 'Permintaan pengajuan akun gagal dikirim']);
            }
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
        $data = Pengaju::getDetailData($id);
        return view('pengajuan.detail')
        ->with('data', $data);
        // print_r($data->id_pengaju);
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
        $data = Pengaju::where('id_pengaju',$id)->first();
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

    //Buat Akun Pengaju Jika di ACC
    public function createAccount($id)
    {
        $status="accept";
        $data = DetailPengaju::where('id_detail_pengaju',$id)->first();
        $data->status = $status;
        if($data->save()){
            $data = Pengaju::find($data['id_pengaju']);
            return view('pengajuan.createAccount')
            ->with('data', $data);
        }
    }

    //Mengirimkan feedback ke pengaju jika di revisi 
    //id = id pengaju
    public function feedbackRevisi($id)
    {
        $tmp_status="revisi";
        $data = DetailPengaju::find($id);
        $data->status = $tmp_status;
        $tmp_id_detail_pengaju = $data['id_detail_pengaju'];   
        $data2 = Pengaju::getDataEmailPengaju($tmp_id_detail_pengaju);
        $tmp_email = $data2->email;
        $data3 = Pengaju::find($data2->id_pengaju);
        if($data->save()){
            Mail::to($tmp_email)->send(new NotifikasiRevisiMail($data3));
            return redirect('pengaju/detail/'.$tmp_id_detail_pengaju)
            ->with(['success' => 'Permintaan revisi berhasil dikirim kepada pengaju']);;
        }else{
            return redirect('pengaju/detail/'.$tmp_id_detail_pengaju)
            ->with(['error' => 'Permintaan revisi gagal dikirim kepada pengaju']);
        }
    }

    //Simpan Akun Pengaju Jika di ACC
    public function storeAccount(Request $request)
    {
        $email=$request->input('email');
        $password=$random = str_random(6);
        // $password=$request->input('password');
        $level="4";
        $data2=new User();
        $data2->email = $email;
        $data2->password = $password;
        $data=new User();
        $data->email = $email;
        $data->password = Hash::make($password);
        $data->level = $level;
        if($data->save()){
            Mail::to($email)->send(new NotifikasiDataAccount($data2));
            return redirect('pengaju/index')
            ->with(['success' => 'Berhasil mendaftarkan akun pengaju']);
        }else{
            return redirect('pengaju/index')
            ->with(['error' => 'Gagal mendaftarkan akun pengaju']);
        }
    }

    public function downloadIzinUsaha($id){
        $data=DetailPengaju::where('id_pengaju',$id)->first();
        $pathToFile='/berkas_izin_usaha'.'/'.$data->path_dokumen;
        return response()->download(public_path($pathToFile));
    }

    public function tracking(){
        return view('pengajuan.tracking');
    }

    public function cekTracking(Request $request){
        $email=$request->input('email');
        $data = Pengaju::getDetailTracking($email);
        if(count($data)>0){
            return view('pengajuan.result_tracking')
            ->with('data', $data);
        }else{
            return redirect('pengaju/tracking')
            ->with(['error' => 'Email yang dimasukan belum pernah diajukan']);
        }

    }

    public function updateTracking($id){
        $data2 = DetailPengaju::find($id);
        $data = Pengaju::joinDetailPengaju($data2['id_detail_pengaju']);
        return view('pengajuan.revisi_tracking')
        ->with('data', $data);
    }

    
    public function saveRevisi(Request $request){
        //upload berkas
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="docx" || $file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="csv" || $file->getClientOriginalExtension()=="xls"){
                $name=("izin_usaha".time()).".".$file->getClientOriginalExtension();
                $file->move('berkas_izin_usaha',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        $id_pengaju=$request->input('id_pengaju');
        $id_detail_pengaju=$request->input('id_detail_pengaju');
        $dokumen=$request->input('dokumen');
        $status = "revisi dikonfirmasi";
        $data=new DetailPengaju();
        $data->id_pengaju = $id_pengaju;
        $data->dokumen = $dokumen;
        $data->path_dokumen = $berkas;
        $data->status = $status;
        if($data->save()){
            $status2 = "telah revisi";
            $data2 = DetailPengaju::where('id_detail_pengaju', $id_detail_pengaju)->first();
            $data2->status =  $status2;
            $data2->save();
            return redirect('/login')
            ->with(['success' => 'Perbaikan dokumen berhasil dikirim']);
        }

        
    }
}
