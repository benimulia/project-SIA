@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Manajemen Kota</h4>

    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Kota
                </div> 
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('cities.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search by Nama Kota</label>
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
        <!-- Show All Cities List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Daftar Kota</h5>
                    <!-- Table that shows Cities List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-1">
                            <tr>
                                <th>ID</th>
                                <th>Nama Kota</th>
                                <th>Kode Pos</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="item-table">
                            <!-- Check if there are any cities to render in view -->
                            @if($cities->count())
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->city_name}}</td>
                                        <td>{{$city->zip_code}}</td>
                                        <td>{{$city->created_at}}</td>
                                        <td>{{$city->updated_at}}</td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    <a href="{{route('cities.edit',$city->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form onsubmit="return confirm('Do you really want to delete?');" action="{{route('cities.destroy',$city->id)}}" method="POST">
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
                                <!-- if there are no cities then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">Data kota tidak ditemukan!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="4">
                                        <a href="/cities" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Cities Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$cities->links('vendor.pagination.default',['paginator' => $cities])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to city.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('cities.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection