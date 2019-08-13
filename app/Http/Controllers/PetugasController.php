<?php

namespace App\Http\Controllers;

use App\User;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Petugas::getBagianPetugas();
        return view('petugas.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.form_tambah');
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
            if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="png"){
                $name=("pp".time()).".".$file->getClientOriginalExtension();
                $file->move('foto_profil',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        $email=$request->input('email');
        $password=$request->input('password');
        $level=$request->input('bagian');
        $data=new User();
        $data->email = $email;
        $data->password = Hash::make($password);
        $data->level = $level;
        if($data->save()){
            $tmp_id = User::getIDUsers($email);
            $user_id=$tmp_id;
            $nama_petugas=$request->input('nama_petugas');
            $tempat_lahir=$request->input('tempat_lahir');
            $tanggal_lahir=$request->input('tanggal_lahir');
            $jenis_kelamin=$request->input('jk');
            $no_telp=$request->input('no_telp');
            $alamat=$request->input('alamat');
            $email=$email;
            $foto=$request->input('foto');
            $data2=new Petugas();
            $data2->user_id = $user_id;
            $data2->nama_petugas = $nama_petugas;
            $data2->tempat_lahir = $tempat_lahir;
            $data2->tanggal_lahir = $tanggal_lahir;
            $data2->jenis_kelamin = $jenis_kelamin;
            $data2->no_telp = $no_telp;
            $data2->alamat = $alamat;
            $data2->email = $email;
            $data2->foto = $berkas;
            if($data2->save()){
                return redirect('petugas/create')
                ->with(['success' => 'Pendaftaran petugas berhasil']);
            }else{
                return redirect('petugas/create')
                ->with(['error' => 'Pendaftaran petugas gagal']);
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
        $data = Petugas::find($id);
        return view('petugas.detail')
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Petugas::find($id)->first();
        $data2 = User::find($data['user_id'])->first();
        if($data->delete()){
            $data2->delete();
            return redirect('petugas/index')
            ->with(['success' => 'Data petugas berhasil dihapus']);
        }else{
            return redirect('petugas/index')
            ->with(['error' => 'Data petugas gagal dihapus']);
        }
    }
}
