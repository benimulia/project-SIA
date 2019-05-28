@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="grey-text text-darken-1">Laporan Penggajian</h4>
    <div class="card-panel">
        <div class="row mb-0">
            <form action="{{route('reportgaji.make')}}" method="POST">
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
            <h5 class="pl-15 grey-text text-darken-2">Daftar Penggajian</h5>
            <!-- Table that shows Employee List -->
            <table class="responsive-table col s12 m12 l12 xl12">
                <thead class="grey-text text-darken-1">
                    <tr>
                        <th>Tanggal Penggajian</th>
                        <th>Nama Pegawai</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Gaji Pokok</th>
                        <th>PPH</th>
                        <th>Total_Gaji</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                    <!-- Check if there are any employee to render in view -->
                    @if($salary_details->count())
                        @foreach($salary_details as $salarydetail)
                            <tr>
                                <td>{{$salarydetail->tgl_gaji}}</td>
                                <td>{{$salarydetail->salEmployee->first_name}} {{$salarydetail->salEmployee->last_name}}</td>
                                <td>{{$salarydetail->salTunjangan->tunjangan_name}} {{$salarydetail->salTunjangan->jml_tunjangan}}</td>
                                <td>{{$salarydetail->salPotongan->potongan_name}} {{$salarydetail->salPotongan->jml_potongan}}</td>
                                <td>{{$salarydetail->salSalary->s_amount}}</td>
                                <td>{{$salarydetail->pph}}</td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * 0.05}}</td>                                     
                            </tr>
                        @endforeach
                            
                    @else
                        {{-- if there are no employees then show this message --}}
                        <tr>
                            <td colspan="7"><h6 class="grey-text text-darken-2 center">Data Penggajian tidak ditemukan!</h6></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- employees Table END -->
        </div>
        <!-- Show Pagination Links -->
        <div class="center">
            {{$salary_details->links('vendor.pagination.default',['paginator' => $salary_details])}}
        </div>
    </div>
</div>
<!-- Card END -->
</div>

@endsection