@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Manajemen Gaji Pokok</h4>
    
    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Gaji Pokok
                </div> 
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('salaries.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search by Jumlah Gaji Pokok</label>
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

    <div class="row">
        <!-- Show All Departments List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Daftar Gaji Pokok</h5>
                    <!-- Table that shows Departments List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>Besar Gaji Pokok</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any salaries to render in view -->
                            @if($salaries->count())
                                @foreach($salaries as $salary)
                                    <tr>
                                        <td>{{$salary->id}}</td>
                                        <td>{{$salary->s_amount}}</td>
                                        <td>{{$salary->created_at}}</td>
                                        <td>{{$salary->updated_at}}</td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    <a href="{{route('salaries.edit',$salary->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('salaries.destroy',$salary->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <!-- if there are no salaries then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">Data gaji pokok tidak ditemukan!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/salaries" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Salaries Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$salaries->links('vendor.pagination.default',['paginator' => $salaries])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to salaries.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('salaries.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection