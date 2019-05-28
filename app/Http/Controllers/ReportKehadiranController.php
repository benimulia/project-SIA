<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Kehadiran;
use DB;
use Carbon\Carbon;
use PDF;
use App;

class ReportKehadiranController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the Report view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kehadirans = Kehadiran::Paginate(4);
        return view('reports.kehadiran')->with('kehadirans',$kehadirans);
    }

    /**
     *  Generate PDF
     * 
     * @return \Illuminate\Http\Response
     */
    public function makeReport(Request $request){
        $this->validate($request,[
            'date_from' => 'required',
            'date_to'   => 'required'
        ]);
        
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        /**
         *  employees between two dates
         */
        $kehadirans = Kehadiran::whereBetween('tgl_kehadiran' ,[new Carbon($date_from),new Carbon($date_to)])->get();

        //generate pdf
        $pdf = PDF::loadView('reports.laporankehadiran',['kehadirans' => $kehadirans])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_kehadiran_dari'.$date_from.'_hingga_'.$date_to.'.pdf');
    }
}
