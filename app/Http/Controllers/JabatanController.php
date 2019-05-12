<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan=Jabatan::all();
        return view('jabatan.index',compact('jabatan'));
    }
    public function vcreate()
    {
        return view('jabatan.create');
    }
    public function create(Request $req)
    {
        $jabatan = new Jabatan;
        $jabatan ->nama_jabatan = $req->input('nama_jabatan');
        $jabatan ->save();
        return redirect('/jabatan');
    }

    public function vedit($id)
    {
        $jabatan = Jabatan::Find($id);
        return view('jabatan.edit',['jabatan' => $jabatan]);
    }

    public function edit(Request $req, $id )
    {
        $jabatan = Jabatan::Find($id);
        $jabatan ->nama_jabatan = $req->input('nama_jabatan');
        $jabatan ->save();
        return redirect('/jabatan');
    }
    public function delete($id)
    {
        $jabatan = Jabatan::Find($id);
        $jabatan ->delete();
        return redirect()->back();
    }
}
