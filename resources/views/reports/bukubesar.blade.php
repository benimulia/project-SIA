@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="grey-text text-darken-1">Laporan Buku Besar</h4>
    <div class="card-panel">
        <div class="row mb-0">
            <form action="{{route('reportbukubesar.make')}}" method="POST">
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
            <h5>Nama Akun : Kas</h5> <p>No. Akun : 112</p>
            <!-- Table that shows Employee List -->
            <table class="responsive-table col s12 m12 l12 xl12">
                <thead class="grey-text text-darken-1">
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Ref</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                    <!-- Check if there are any employee to render in view -->
                    @if($salarydetails->count())
                        @foreach($salarydetails as $salarydetail)                            
                            <tr>
                                <td>{{$salarydetail->tgl_gaji}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * ($salarydetail->pph / 100)}}</td>                                    
                            </tr>
                        @endforeach
                            
                    @else
                        {{-- if there are no employees then show this message --}}
                        <tr>
                            <td colspan="5"><h6 class="grey-text text-darken-2 center">Data Kas tidak ditemukan!</h6></td>
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
<div class="card">
    <div class="card-content">
        <div class="row">
            <h5>Nama Akun : Beban Gaji</h5> <p>No. Akun : 512</p>
            <!-- Table that shows Employee List -->
            <table class="responsive-table col s12 m12 l12 xl12">
                <thead class="grey-text text-darken-1">
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Ref</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                    <!-- Check if there are any employee to render in view -->
                    @if($salarydetails->count())
                        @foreach($salarydetails as $salarydetail)
                            <tr>
                                <td>{{$salarydetail->tgl_gaji}}</td>
                                <td></td>
                                <td></td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * ($salarydetail->pph / 100)}}</td>
                                <td></td>                                    
                            </tr>
                        @endforeach
                            
                    @else
                        {{-- if there are no employees then show this message --}}
                        <tr>
                            <td colspan="5"><h6 class="grey-text text-darken-2 center">Data Beban Gaji tidak ditemukan!</h6></td>
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
</div>

@endsection