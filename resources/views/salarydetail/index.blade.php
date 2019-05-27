@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-1 center">Detail Gaji Pegawai</h4>
    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Pegawai
                </div>
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('salarydetails.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search Pegawai</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m6 l4 xl4">
                                <select name="options" id="options">
                                    <option value="employee_id">ID Pegawai</option>
                                    <option value="first_name">Nama Pegawai</option>
                                </select>
                                <label for="options">Search by:</label>
                            </div>
                            <br>
                            <div class="col l2">
                                <button type="submit" class="btn waves-effect waves-light">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    {{-- Search END --}}
        <!-- Show All Employee List as a Card -->
    <div class="card">
        <div class="card-content">
            <div class="row">
                <h5 class="pl-15 grey-text text-darken-2">Data Pegawai</h5>
                <!-- Table that shows Employee List -->
                <table class="responsive-table col s12 m12 l12 xl12">
                    <thead class="grey-text text-darken-1">
                        <tr>
                            <th>ID</th>
                            <th>Nama Pegawai</th>
                            <th>Departemen</th>
                            <th>Divisi</th>
                            <th>Gaji</th>
                            <th>PPH</th>
                            <th>Total Gaji</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="emp-table">
                        <!-- Check if there are any employee to render in view -->
                        @if($salarydetails->count())
                            @foreach($salarydetails as $salarydetail)
                                <tr>
                                    <td>{{$salarydetail->salEmployee->employee_id}}</td>
                                    <td>{{$salarydetail->salEmployee->first_name}} {{$employee->salEmployee->last_name}}</td>
                                    <td>{{$salarydetail->salDepartment->dept_name}}</td>
                                    <td>{{$salarydetail->salDivision->division_name}}</td>
                                    <td>{{$salarydetail->salSalary->s_amount}}</td>
                                    <td>{{$salarydetail->PPH}}</td>
                                    <td>{{$salarydetail->salary_total}}</td>
                                    <a href="{{route('employees.show',$employee->id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">list</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if(isset($search))
                                <tr>
                                    <td colspan="4">
                                        <a href="/employees" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        @else
                            {{-- if there are no employees then show this message --}}
                            <tr>
                                <td colspan="5"><h6 class="grey-text text-darken-2 center">No Employees Found!</h6></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- employees Table END -->
            </div>
            <!-- Show Pagination Links -->
            <div class="center">
                {{$salarydetails->links('vendor.pagination.default',['paginator' => $salarydetails])}}
            </div>
        </div>
    </div>
    <!-- Card END -->
</div>
<!-- This is the button that is located at the right bottom, that navigates us to employees.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('salarydetails.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection