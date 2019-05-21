<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index',compact('pegawai'));
    }

    public function vcreate()
    {
        return view('pegawai.create');
    }
    public function create(Request $req)
    {
        $pegawai = new Pegawai();        
        $pegawai ->nama_pegawai = $req->input('nama_pegawai');
        $pegawai ->alamat_pegawai = $req->input('alamat_pegawai');
        $pegawai ->tgl_lahir = $req->input('tgl_lahir');
        $pegawai ->tgl_masuk = $req->input('tgl_masuk');
        $pegawai ->jabatan_pegawai = $req->input('jabatan_pegawai');
        $pegawai ->divisi_pegawai = $req->input('divisi_pegawai');
        if($req->file('file')!=null){
            $photo = $req->file('file');
            $path = Storage::disk('local')->put('pegawai', $photo); //nama folder,file yang diinput
            $pegawai ->picture = $path;
        }

        $pegawai ->save();
        return redirect('/pegawai');
    }

    public function vedit($id)
    {
        $pegawai = Pegawai::Find($id);
        return view('pegawai.edit',['pegawai' => $pegawai]);
    }

    public function edit(Request $req, $id )
    {
        $pegawai = Pegawai::Find($id);
        $pegawai ->nama_pegawai = $req->input('nama_pegawai');
        $pegawai ->alamat_pegawai = $req->input('alamat_pegawai');
        $pegawai ->tgl_lahir = $req->input('tgl_lahir');
        $pegawai ->tgl_masuk = $req->input('tgl_masuk');
        $pegawai ->jabatan_pegawai = $req->input('jabatan_pegawai');
        $pegawai ->divisi_pegawai = $req->input('divisi_pegawai');
        if($req->file('file')!=null){
            $photo = $req->file('file');
            $path = Storage::disk('local')->put('pegawai', $photo); //nama folder,file yang diinput
            $pegawai ->picture = $path;
        }

        $pegawai ->save();  
        return redirect('/pegawai');
    }

    public function delete($id)
    {
        $pegawai = Pegawai::Find($id);
        $pegawai ->delete();
        return redirect()->back();
    }
}
