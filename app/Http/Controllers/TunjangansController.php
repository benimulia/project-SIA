<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tunjangan;

class TunjangansController extends Controller
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
        
        $tunjangans = Tunjangan::paginate(5);
        return view('sys_mg.tunjangans.index')->with('tunjangans',$tunjangans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_mg.tunjangans.create');
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
            'tunjangan_name' => 'required|min:3|unique:tunjangans'
        ]);
        $tunjangan = new Tunjangan();
        $tunjangan->tunjangan_name = $request->input('tunjangan_name');
        $tunjangan->jml_tunjangan = $request->input('jml_tunjangan');
        $tunjangan->save();
        return redirect('/tunjangans')->with('info','New Tunjangan has been created!');
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
        $tunjangan = Tunjangan::find($id);
        return view('sys_mg.tunjangans.edit')->with('tunjangan',$tunjangan);
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
            'tunjangan_name' => 'required|min:3|unique:tunjangans'
        ]);
        $tunjangan = Tunjangan::find($id);
        $tunjangan->tunjangan_name = $request->input('tunjangan_name');
        $tunjangan->jml_tunjangan = $request->input('jml_tunjangan');
        $tunjangan->save();
        return redirect('/tunjangans')->with('info','Selected Tunjangan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjangan = Tunjangan::find($id);
        $tunjangan->delete();
        return redirect('/tunjangans')->with('info','Selected Tunjangan has been deleted!');
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
        $tunjangans = Tunjangan::where( 'tunjangan_name' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('tunjangan_name','asc')
            ->paginate(4);
        return view('sys_mg.tunjangans.index')->with([ 'tunjangans' => $tunjangans ,'search' => true ]);
    }
}
