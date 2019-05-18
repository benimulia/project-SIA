<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Potongan;

class PotonganController extends Controller
{
    public function index()
    {
        $potongan=Potongan::all();
        return view('potongan.index',compact('potongan'));
    }
    public function vcreate()
    {
        return view('potongan.create');
    }
    public function create(Request $req)
    {
        $potongan = new Potongan;
        $potongan ->nama_potongan = $req->input('nama_potongan');
        $potongan ->jml_potongan = $req->input('jml_potongan');
        $potongan ->save();
        return redirect('/potongan');
    }

    public function vedit($id)
    {
        $potongan = Potongan::Find($id);
        return view('potongan.edit',['potongan' => $potongan]);
    }

    public function edit(Request $req, $id )
    {
        $potongan = Potongan::Find($id);
        $potongan ->nama_potongan = $req->input('nama_potongan');
        $potongan ->save();
        return redirect('/potongan');
    }
    public function delete($id)
    {
        $potongan = Potongan::Find($id);
        $potongan ->delete();
        return redirect()->back();
    }
}
