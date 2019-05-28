@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Tambah Akun</h4>
                <div class="card-content">
                    <div class="row">
                        <!--
                            $errors has all validation errors if you wanna
                            show validation failure message then you can use it
                            like below.
                            $errors->has('input name') will return boolean
                            Request::old('input name') will return the value of the input field
                            that we have submitted.
                            $errors->first('input name') will return the first validation error,
                            so you can show it on the form.
                        -->
                        <form action="{{route('accounts.store')}}" method="POST">
                                <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                    <i class="material-icons prefix">account_balance</i>
                                    <input type="text" name="account_id" id="account_id" value="{{Request::old('account_id') ? : ''}}">
                                    <label for="account_id">ID Akun</label>
                                    <span class="{{$errors->has('account_id') ? 'helper-text red-text' : ''}}">{{$errors->first('account_id')}}</span>
                                </div>
                                <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                    <i class="material-icons prefix">account_balance</i>
                                    <input type="text" name="nama" id="nama" value="{{Request::old('nama') ? : ''}}">
                                    <label for="nama">Nama</label>
                                    <span class="{{$errors->has('nama') ? 'helper-text red-text' : ''}}">{{$errors->first('nama')}}</span>
                                </div>
                                <div class="input-field col s12 m6 l6 xl4 offset-xl2">
                                    <i class="material-icons prefix">account_balance</i>
                                    <input type="text" name="keterangan" id="keterangan" value="{{Request::old('keterangan') ? : ''}}">
                                    <label for="keterangan">Keterangan</label>
                                    <span class="{{$errors->has('keterangan') ? 'helper-text red-text' : ''}}">{{$errors->first('keterangan')}}</span>
                                </div>                        
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a href="/accounts">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection