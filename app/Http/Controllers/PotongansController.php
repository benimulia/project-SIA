<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Potongan;

class PotongansController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  read all the comments from DepartmentsController
         *  they are all the same.
         */
        
        $potongans = Potongan::paginate(5);
        return view('sys_mg.potongans.index')->with('potongans',$potongans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_mg.potongans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'potongan_name' => 'required|min:3|unique:potongans'
        ]);
        $potongans = new Potongan();
        $potongans->potongan_name = $request->input('potongan_name');
        $potongans->jml_potongan = $request->input('jml_potongan');
        $potongans->save();
        return redirect('/potongans')->with('info','Data potongan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $potongan = Potongan::find($id);
        return view('sys_mg.potongans.edit')->with('potongan',$potongan);
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
        $this->validate($request,[
            'potongan_name' => 'required|min:3|unique:potongans'
        ]);
        $potongans = Potongan::find($id);
        $potongans->potongan_name = $request->input('potongan_name');
        $potongans->jml_potongan = $request->input('jml_potongan');
        $potongans->save();
        return redirect('/tunjangans')->with('info','Data potongan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $potongan = Potongan::find($id);
        $potongan->delete();
        return redirect('/potongans')->with('info','Data potongan berhasil dihapus!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $tunjangans = Tunjangan::where( 'potongan_name' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('potongan_name','asc')
            ->paginate(4);
        return view('sys_mg.potongan.index')->with([ 'potongans' => $potongans ,'search' => true ]);
    }
}
