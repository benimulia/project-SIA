@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update Potongan</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('potongans.update',$potongan->id)}}" method="POST">
                            <div class="input-field no-margin">
                                <i class="material-icons prefix">money_off</i>
                                <input type="text" name="potongan_name" id="potongan_name" value="{{Request::old('potongan_name') ? : $potongan->potongan_name}}">
                                <label for="potongan_name">Nama Potongan</label>
                                <span class="{{$errors->has('potongan_name') ? 'helper-text red-text' : ''}}">{{$errors->first('potongan_name')}}</span>
                            </div>
                            <div class="input-field no-margin">
                                <i class="material-icons prefix">attach_money</i>
                                <input type="text" name="jml_potongan" id="jml_potongan" value="{{Request::old('jml_potongan') ? : $potongan->jml_potongan}}">
                                <label for="jml_potongan">Jumlah Potongan</label>
                                <span class="{{$errors->has('jml_potongan') ? 'helper-text red-text' : ''}}">{{$errors->first('jml_potongan')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/potongans">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection