<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Divisi;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi=Divisi::all();
        return view('divisi.index',compact('divisi'));
    }
    public function vcreate()
    {
        return view('divisi.create');
    }
    public function create(Request $req)
    {
        $divisi = new Divisi;
        $divisi ->nama_divisi = $req->input('nama_divisi');
        $divisi ->save();
        return redirect('/divisi');
    }

    public function vedit($id)
    {
        $divisi = Divisi::Find($id);
        return view('divisi.edit',['divisi' => $divisi]);
    }

    public function edit(Request $req, $id )
    {
        $divisi = Divisi::Find($id);
        $divisi ->nama_divisi = $req->input('nama_divisi');
        $divisi ->save();
        return redirect('/divisi');
    }
    public function delete($id)
    {
        $divisi = Divisi::Find($id);
        $divisi ->delete();
        return redirect()->back();
    }
}
