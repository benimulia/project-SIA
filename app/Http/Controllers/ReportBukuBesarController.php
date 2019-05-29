<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryDetail;
use DB;
use Carbon\Carbon;
use PDF;
use App;

class ReportBukuBesarController extends Controller
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
        $salarydetails = SalaryDetail::Paginate(4);
        return view('reports.bukubesar')->with('salarydetails',$salarydetails);
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
        $salarydetails = SalaryDetail::whereBetween('tgl_gaji' ,[new Carbon($date_from),new Carbon($date_to)])->get();

        //generate pdf
        $pdf = PDF::loadView('reports.laporanbukubesar',['salarydetails' => $salarydetails])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_junal_umum_dari'.$date_from.'_hingga_'.$date_to.'.pdf');
    }
}
