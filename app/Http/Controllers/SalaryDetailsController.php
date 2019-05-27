<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\SalaryDetail;
use App\Employee;
use App\Department;
use App\Salary;
use App\Division;
use App\Potongan;
use App\Tunjangan;

class SalaryDetailsController extends Controller
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
        $salarydetails = SalaryDetail::Paginate(4);
        return view('salarydetail.index')->with('salarydetails',$salarydetails);
    }

    public function create()
    {
        /**
         *  Get Departments so we can show department
         *  name on the department dropdown in the view
         */
        $departments = Department::orderBy('dept_name','asc')->get();
        /**
         *  this and other objects works the same as department
         */
        $tunjangans = Tunjangan::orderBy('tunjangan_name','asc')->get();
        $employees = Employee::orderBy('first_name','asc')->get();
        $potongans = Potongan::orderBy('potongan_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();
        /**
         *  return the view with an array of all these objects
         */
        return view('salarydetail.create')->with([
            'departments'  => $departments,
            'employees'    => $employees,
            'tunjangans'   => $tunjangans,
            'potongans'    => $potongans,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
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
        $salarydetails = new SalaryDetail();
        
        /**
         *  setEmployee is also a method of this controller
         *  which i have created, so i can use it for update 
         *  method.
         */
        $this->setSalaryDetail($salarydetails,$request);
        
        return redirect('/salarydetails')->with('info','Detail Gaji baru telah ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         *  Get Departments so we can show department
         *  name on the department dropdown in the view
         */
        $departments = Department::orderBy('dept_name','asc')->get();
        /**
         *  this and other objects works the same as department
         */
        $tunjangans = Tunjangan::orderBy('tunjangan_name','asc')->get();
        $employees = Employee::orderBy('first_name','asc')->get();
        $potongans = Potongan::orderBy('potongan_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();

        $salarydetail = SalaryDetail::find($id);
        return view('salarydetail.create')->with([
            'departments'  => $departments,
            'employees'    => $employees,
            'tunjangans'   => $tunjangans,
            'potongans'    => $potongans,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
        ]);
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

        $this->validateRequest($request,$id);
        $salarydetail = SalaryDetail::find($id);
        
        /**
         *  updating an existing employee with setEmployee
         *  method
         */
        $this->setSalaryDetail($salarydetail,$request);
        return redirect('/salarydetails')->with('info','Detail Gaji berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salarydetail = SalaryDetail::find($id);
        $salarydetail->delete();
        return redirect('/salarydetails')->with('info','Detail Gaji telah dihapus!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search'   => 'required|min:1',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $salarydetails = SalaryDetail::where($option, 'LIKE' , '%'.$str.'%')->Paginate(4);
        return view('salarydetail.index')->with(['salarydetails' => $salarydetails , 'search' => true ]);
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
            'department'     =>  'required',
            'division'       =>  'required',
            'salary'         =>  'required',
            'tunjangan'      =>  'required',
            'potongan'       =>  'required',
            'PPH'            =>  'required|max:2',
            'salary_total'   =>  'required|max:9'
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
    private function setSalaryDetail(SalaryDetail $salarydetail,Request $request){
        $salarydetail->first_name   = $request->input('first_name');
        $salarydetail->dept_id      = $request->input('department');
        $salarydetail->division_id  = $request->input('division');
        $salarydetail->salary_id    = $request->input('salary'); 
        $salarydetail->tunjangan_id    = $request->input('tunjangan');
        $salarydetail->potongan_id    = $request->input('potongan');
        $salarydetail->pph   = $request->input('PPH');
        $salarydetail->salary_total   = $request->input('salary_total');
        
        $salarydetail->save();
    }

}