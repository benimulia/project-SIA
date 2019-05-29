@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-1 center">Detail Gaji Pegawai</h4>
    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Penggajian
                </div>
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('salarydetails.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search by ID Pegawai</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <br>
                            <div class="col l2">
                                <button type="submit" class="btn waves-effect waves-light">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    {{-- Search END --}}
        <!-- Show All Employee List as a Card -->
    <div class="card">
        <div class="card-content">
            <div class="row">
                <h5 class="pl-15 grey-text text-darken-2">Detail Gaji Pegawai</h5>
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
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="dept-table">
                        <!-- Check if there are any employee to render in view -->
                        @if($salarydetails->count())
                            @foreach($salarydetails as $salarydetail)
                                <tr>
                                    <td>{{$salarydetail->tgl_gaji}}</td>
                                    <td>{{$salarydetail->salEmployee->first_name}} {{$salarydetail->salEmployee->last_name}}</td>
                                    <td>{{$salarydetail->salTunjangan->tunjangan_name}} {{$salarydetail->salTunjangan->jml_tunjangan}}</td>
                                    <td>{{$salarydetail->salPotongan->potongan_name}} {{$salarydetail->salPotongan->jml_potongan}}</td>
                                    <td>{{$salarydetail->salSalary->s_amount}}</td>
                                    <td>{{$salarydetail->pph}}</td>
                                    <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * 0.05}}</td>
                                    <td>
                                        <div class="row mb-0">
                                        <div class="col">
                                                <a href="{{route('salarydetails.edit',$salarydetail->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                            </div><br/> 
                                            <div class="col">
                                                <form action="{{route('salarydetails.destroy',$salarydetail->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf()
                                                    <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>                                 
                                </tr>
                            @endforeach
                            @if(isset($search))
                                <tr>
                                    <td colspan="4">
                                        <a href="/salarydetails" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        @else
                            {{-- if there are no employees then show this message --}}
                            <tr>
                                <td colspan="5"><h6 class="grey-text text-darken-2 center">Detail Gaji tidak Ada!</h6></td>
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
</div>
<!-- This is the button that is located at the right bottom, that navigates us to employees.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('salarydetails.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection