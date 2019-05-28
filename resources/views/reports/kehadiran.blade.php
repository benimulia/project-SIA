@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="grey-text text-darken-1">Laporan Kehadiran</h4>
    <div class="card-panel">
        <div class="row mb-0">
            <form action="{{route('reportkehadiran.make')}}" method="POST">
            @csrf()
                <div class="input-field col s10 offset-s1 m4 l4 xl3 offset-xl1">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" name="date_from" id="date_from" class="datepicker" value="{{old('date_from') ? : ''}}">
                    <label for="date_from">Dari Tanggal</label>
                    <span class="{{$errors->has('date_from') ? 'helper-text red-text' : ''}}">{{$errors->has('date_from') ? $errors->first('date_from') : ''}}</span>
                </div>
                <div class="input-field col s10 offset-s1 m4 l4 xl3">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" name="date_to" id="date_to" class="datepicker" value="{{old('date_to') ? : ''}}">
                    <label for="date_to">Hingga Tanggal</label>
                    <span class="{{$errors->has('date_to') ? 'helper-text red-text' : ''}}">{{$errors->has('date_to') ? $errors->first('date_to') : ''}}</span>
                </div>
                <br>
                <button type="submit" class="btn col s6 offset-s3 m3 l3 xl3 offset-xl1">Cetak PDF</button>
            </form>
        </div>
    </div>

    <!-- Show All Employee List as a Card -->
    <div class="card">
    <div class="card-content">
        <div class="row">
            <h5 class="pl-15 grey-text text-darken-2">Daftar Kehadiran</h5>
            <!-- Table that shows Employee List -->
            <table class="responsive-table col s12 m12 l12 xl12">
                <thead class="grey-text text-darken-1">
                    <tr>
                        <th>Tanggal Kehadiran</th>
                        <th>Nama</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                    <!-- Check if there are any employee to render in view -->
                    @if($kehadirans->count())
                        @foreach($kehadirans as $kehadiran)
                            <tr>
                                <td>{{$kehadiran->tgl_kehadiran}}</td>
                                <td>{{$kehadiran->empKehadiran->first_name}} {{$kehadiran->empKehadiran->last_name}}</td>
                                <td>{{$kehadiran->jam_masuk}}</td>
                                <td>{{$kehadiran->jam_keluar}}</td>
                                <td>{{$kehadiran->keterangan}}</td>                                    
                            </tr>
                        @endforeach
                    @else
                        {{-- if there are no employees then show this message --}}
                        <tr>
                            <td colspan="5"><h6 class="grey-text text-darken-2 center">Data kehadiran tidak ditemukan!</h6></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- employees Table END -->
        </div>
        <!-- Show Pagination Links -->
        <div class="center">
            {{$kehadirans->links('vendor.pagination.default',['paginator' => $kehadirans])}}
        </div>
    </div>
</div>
<!-- Card END -->
</div>

@endsection