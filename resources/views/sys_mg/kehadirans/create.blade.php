@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m12 l12 xl12 mt-20">
                <div>
                <h4 class="center grey-text text-darken-2 card-title">Tambah Kehadiran</h4>
                </div>
                <hr>
                <div class="card-content">
                    <form action="{{route('kehadirans.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col m6 l6 xl4 offset-xl2">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" name="tgl_kehadiran" id="tgl_kehadiran" class="datepicker" value="{{old('tgl_kehadiran') ? : ''}}">
                                <label for="tgl_kehadiran">Tanggal Kehadiran</label>
                                <span class="{{$errors->has('tgl_kehadiran') ? 'helper-text red-text' : ''}}">{{$errors->has('tgl_kehadiran') ? $errors->first('tgl_kehadiran') : ''}}</span>
                            </div>
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
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2" style="margin-bottom: 0px;">
                            Jam Masuk
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">                                
                                <i class="material-icons prefix">access_time</i>
                                <input type="time" name="jam_masuk" id="jam_masuk" value="{{Request::old('jam_masuk') ? : ''}}">                                
                                <span class="{{$errors->has('jam_masuk') ? 'helper-text red-text' : ''}}">{{$errors->has('jam_masuk') ? $errors->first('jam_masuk') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2" style="margin-bottom: 0px;">
                            Jam Keluar
                            </div>    
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">access_time</i>
                                <input type="time" name="jam_keluar" id="jam_keluar" value="{{Request::old('jam_keluar') ? : ''}}">
                                <span class="{{$errors->has('jam_keluar') ? 'helper-text red-text' : ''}}">{{$errors->has('jam_keluar') ? $errors->first('jam_masuk') : ''}}</span>
                            </div>
                            <div class="input-field col s12 m6 l6 xl8 offset-xl2">
                                <i class="material-icons prefix">assessment</i>
                                <input type="text" name="keterangan" id="keterangan" value="{{Request::old('keterangan') ? : ''}}">
                                <label for="keterangan">Keterangan</label>
                                <span class="{{$errors->has('keterangan') ? 'helper-text red-text' : ''}}">{{$errors->has('keterangan') ? $errors->first('keterangan') : ''}}</span>
                            </div>
                        </div>
                        @csrf()
                        <div class="row">
                            <button type="submit" class="btn waves-effect waves-light col s8 offset-s2 m4 offset-m4 l4 offset-l4 xl4 offset-xl4">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="/kehadirans">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection