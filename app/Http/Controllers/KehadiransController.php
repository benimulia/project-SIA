<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Kehadiran;
use DB;

class KehadiransController extends Controller
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
        // $kehadiran = Kehadiran::Paginate(4);
        $kehadiran = Kehadiran::orderBy('tgl_kehadiran','asc')->paginate(4);
        return view('sys_mg.kehadirans.index')->with('kehadirans',$kehadiran);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *  Get Employees so we can show employee
         *  name on the employee dropdown in the view
         */
        $employees = Employee::orderBy('id','first_name')->get();
        /**
         *  return the view with an array of all these objects
         */
        return view('sys_mg.kehadirans.create')->with([
            'employees'  => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        /**
         *  validateRequest is a method defined in this controller
         *  which will validate  the form. we have created 
         *  it so we can reuse it in the update method with 
         *  different parameters.
         */
        $this->validateRequest($request,null);
        
        /**
         *  Note!
         *  before using storage we need to link it to 
         *  the public folder by typing the command,
         *  php artisan storage:link  
         */

        /**
         *  Create new object of Employee
         */
        $kehadiran = new Kehadiran();
        
        /**
         *  setEmployee is also a method of this controller
         *  which i have created, so i can use it for update 
         *  method.
         */
        $this->setKehadiran($kehadiran,$request);
        
        return redirect('/kehadirans')->with('info','Data kehadiran telah ditambahkan');
    }
    
    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $kehadirans = Kehadiran::where( 'employee_id' , 'LIKE' , '%'.$str.'%' )
            ->orderBy('employee_id','asc')
            ->paginate(4);
        return view('sys_mg.kehadirans.index')->with([ 'kehadirans' => $kehadirans ,'search' => true ]);
    }

    /**
     * This method is used for validating the form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    private function validateRequest($request,$id){
        /**
         *  specifying the validation rules 
         */
        /**
         *  Below in Picture validation rules we are first checking
         *  that if there is an image, if not then don't apply the
         *  validation rules. the reason we are doing this is because
         *  if we are updating an employee but not updating the image. 
         */
        return $this->validate($request,[
            'employee'       =>  'required',
            'tgl_kehadiran'  =>  'required',
            'jam_masuk'      =>  'required',
            'jam_keluar'     =>  'required'
            /**
             *  if we are updating an employee but not changing the
             *  email then this will throw a validation error saying
             *  that email should be unique. that's why we need to specify
             *  the current employee to ignore the unique validation rule.
             *  Above in email rules , we are using a ternary operator simply
             *  saying that if we pass an id then it will ignore that employee
             *  (which we want in update) and if id's null then it will check
             *  every employee to be unique (which we want in create because
             *  every employee should have a unique email).
             *  check the documentation for more details, 
             *  https://laravel.com/docs/5.6/validation#rule-unique 
             */

            
        ]);
    }

    /**
     * Save a new resource or update an existing resource.
     *
     * @param  App\Employee $employee
     * @param  \Illuminate\Http\Request  $request
     * @param  string $fileNameToStore
     * @return Boolean
     */
    private function setKehadiran(Kehadiran $kehadiran,Request $request){
        $kehadiran->employee_id     = $request->input('employee');
        $kehadiran->tgl_kehadiran   = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('tgl_kehadiran'))));
        $kehadiran->jam_masuk       = $request->input('jam_masuk');
        $kehadiran->jam_keluar      = $request->input('jam_keluar');
        $kehadiran->keterangan      = $request->input('keterangan');
        
        
        $kehadiran->save();
    }

}
