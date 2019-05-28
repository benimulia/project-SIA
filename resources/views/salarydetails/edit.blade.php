@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Tambah Detail Gaji</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('salarydetail.update',$salarydetail->id)}}" method="POST">
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
                            <div class="input-field col m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="tgl_gaji" id="tgl_gaji" class="datepicker" value="{{old('tgl_gaji') ? : ''}}">
                                <label for="tgl_gaji">Tanggal Penggajian</label>
                                <span class="{{$errors->has('tgl_gaji') ? 'helper-text red-text' : ''}}">{{$errors->has('tgl_gaji') ? $errors->first('tgl_gaji') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">attach_money</i>
                                <select name="tunjangan">
                                    <option value="" disabled {{ old('tunjangan') ? '' : 'selected' }}>Pilih Tunjangan</option>
                                    @foreach($tunjangans as $tunjangan)
                                        <option value="{{$tunjangan->id}}" {{ old('tunjangan') ? 'selected' : '' }}>{{$tunjangan->tunjangan_name}}   Rp {{$tunjangan->jml_tunjangan}}</option>
                                    @endforeach
                                </select>
                                <label>Tunjangan</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">attach_money</i>
                                <select name="potongan">
                                    <option value="" disabled {{ old('potongan') ? '' : 'selected' }}>Pilih Potongan</option>
                                    @foreach($potongans as $potongan)
                                        <option value="{{$potongan->id}}" {{ old('potongan') ? 'selected' : '' }}>{{$potongan->potongan_name}}   Rp {{$potongan->jml_potongan}}</option>
                                    @endforeach
                                </select>
                                <label>Potongan</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">attach_money</i>
                                <select name="salary">
                                    <option value="" disabled {{ old('salary') ? '' : 'selected' }}>Pilih gaji pokok</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}" {{ old('salary') ? 'selected' : '' }}>Rp {{$salary->s_amount}}</option>
                                    @endforeach
                                </select>
                                <label>Gaji Pokok</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">perm_identity</i>
                                <input type="number" name="pph" id="pph" value="{{Request::old('pph') ? : ''}}">
                                <label for="pph">PPH</label>
                                <span class="{{$errors->has('pph') ? 'helper-text red-text' : ''}}">{{$errors->has('pph') ? $errors->first('pph') : ''}}</span>
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