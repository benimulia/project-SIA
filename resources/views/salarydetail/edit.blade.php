@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Update Detail Gaji</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('salarydetails.update',$salarydetail->id)}}" method="POST">
                        <div class="row">
                        <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">person_outline</i>
                                <select name="employee">
                                    <option value="" disabled {{ old('employee')? '' : 'selected' }}>Pilih pegawai</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" {{ old('employee')? 'selected' : '' }}>{{$employee->first_name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                <label>Nama Pegawai</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">business</i>
                                <select name="department">
                                    <option value="" disabled>Pilih departemen</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{old('department') ? 'selected' : ''}} {{ $employee->empDepartment==$department ? 'selected' : '' }} >{{$department->dept_name}}</option>
                                    @endforeach
                                </select>
                                <label>Departemen</label>
                            </div>
                            <div class="input-field col s12 m12 l12 xl8 offset-xl2">
                                <i class="material-icons prefix">business</i>
                                <select name="division">
                                    <option value="" disabled >Pilih divisi</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}" {{ old('division') ? 'selected' : '' }} {{ $employee->empDivision==$division ? 'selected' : '' }} >{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                <label>Divisi</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">attach_money</i>
                                <select name="salary">
                                    <option value="" disabled>Pilih gaji pokok</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}" {{old('salary') ? 'selected' : ''}} {{ $employee->empSalary==$salary ? 'selected' : '' }} >${{$salary->s_amount}}</option>
                                    @endforeach
                                </select>
                                <label>Gaji Pokok</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">loyalty</i>
                                <input type="text" name="pph" id="pph" value="{{Request::old('pph') ? : ''}}">
                                <label for="pph">PPH</label>
                                <span class="{{$errors->has('pph') ? 'helper-text red-text' : ''}}">{{$errors->has('pph') ? $errors->first('pph') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4">
                                <i class="material-icons prefix">loyalty</i>
                                <input type="text" name="salary_total" id="salary_total" value="{{Request::old('salary_total') ? : ''}}">
                                <label for="salary_total">Total Gaji</label>
                                <span class="{{$errors->has('salary_total') ? 'helper-text red-text' : ''}}">{{$errors->has('salary_total') ? $errors->first('salary_total') : ''}}</span>
                            </div>
                        </div>
                        @method('PUT')
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/salarydetails">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
