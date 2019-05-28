@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update Akun</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('accounts.update',$account->id)}}" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">location_city</i>    
                                <input type="text" name="nama" id="nama" value="{{Request::old('nama') ? : $account->nama}}">
                                <label for="nama">Nama Akun</label>
                                <span class="{{$errors->has('nama') ? 'helper-text red-text' : ''}}">{{$errors->first('nama')}}</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_lock</i>
                                <input type="text" name="account_id" id="account_id" class="validate" value="{{Request::old('account_id') ? : $account->account_id}}">
                                <label for="account_id">ID Akun</label>
                                <span class="{{$errors->has('account_id') ? 'helper-text red-text' : '' }}">{{$errors->first('account_id')}}</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_lock</i>
                                <input type="text" name="keterangan" id="keterangan" class="validate" value="{{Request::old('keterangan') ? : $account->keterangan}}">
                                <label for="account_id">Keterangan</label>
                                <span class="{{$errors->has('keterangan') ? 'helper-text red-text' : '' }}">{{$errors->first('keterangan')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/accounts">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection