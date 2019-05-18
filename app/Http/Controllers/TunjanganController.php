<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tunjangan;

class PotonganController extends Controller
{
    public function index()
    {
        $tunjangan=Tunjangan::all();
        return view('tunjangan.index',compact('tunjangan'));
    }
    public function vcreate()
    {
        return view('tunjangan.create');
    }
    public function create(Request $req)
    {
        $tunjangan = new Tunjangan;
        $tunjangan ->nama_tunjangan = $req->input('nama_tunjangan');
        $tunjangan ->jml_tunjangan = $req->input('jml_tunjangan');
        $tunjangan ->save();
        return redirect('/tunjangan');
    }

    public function vedit($id)
    {
        $tunjangan = Tunjangan::Find($id);
        return view('tunjangan.edit',['tunjangan' => $tunjangan]);
    }

    public function edit(Request $req, $id )
    {
        $tunjangan = Tunjangan::Find($id);
        $tunjangan ->nama_tunjangan = $req->input('nama_tunjangan');
        $tunjangan ->save();
        return redirect('/tunjangan');
    }
    public function delete($id)
    {
        $tunjangan = Tunjangan::Find($id);
        $tunjangan ->delete();
        return redirect()->back();
    }
}
