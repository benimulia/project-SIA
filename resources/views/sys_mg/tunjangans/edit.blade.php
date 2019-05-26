@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Update Tunjangan</h4>
                <div class="card-content">
                    <div class="row">
                        <form action="{{route('tunjangans.update',$tunjangan->id)}}" method="POST">
                            <div class="input-field no-margin">
                                <i class="material-icons prefix">business</i>
                                <input type="text" name="tunjangan_name" id="tunjangan_name" value="{{Request::old('tunjangan_name') ? : $tunjangan->tunjangan_name}}">
                                <label for="tunjangan_name">Nama Tunjangan</label>
                                <span class="{{$errors->has('tunjangan_name') ? 'helper-text red-text' : ''}}">{{$errors->first('tunjangan_name')}}</span>
                            </div>
                            <div class="input-field no-margin">
                                <i class="material-icons prefix">business</i>
                                <input type="text" name="jml_tunjangan" id="jml_tunjangan" value="{{Request::old('jml_tunjangan') ? : $tunjangan->jml_tunjangan}}">
                                <label for="jml_tunjangan">Jumlah Tunjangan</label>
                                <span class="{{$errors->has('jml_tunjangan') ? 'helper-text red-text' : ''}}">{{$errors->first('jml_tunjangan')}}</span>
                            </div>
                            @method('PUT')
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Update</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a href="/tunjangans">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection