@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center"> Manajemen Tunjangan</h4>
    
    {{-- Include the searh component with with title and route --}}
    @component('sys_mg.inc.search',['title' => 'Tunjangan' , 'route' => '$tunjangans.search'])
    @endcomponent
    
    <div class="row">
        <!-- Show All Division List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Daftar Tunjangan</h5>
                    <!-- Table that shows Division List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>Nama Tunjangan</th>
                                <th>Jumlah</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any division to render in view -->
                            @if($tunjangans->count())
                                @foreach($tunjangans as $tunjangan)
                                    <tr>
                                        <td>{{$tunjangan->id}}</td>
                                        <td>{{$tunjangan->tunjangan_name}}</td>
                                        <td>{{$tunjangan->jml_tunjangan}}</td>
                                        <td>{{$tunjangan->created_at}}</td>
                                        <td>{{$tunjangan->updated_at}}</td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    <a href="{{route('tunjangans.edit',$tunjangan->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('tunjangans.destroy',$tunjangan->id)}}" method="POST">
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
                                <!-- if there are no Divisions then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">Tidak Ada Tunjangan</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/tunjangans" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Divisions Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$tunjangans->links('vendor.pagination.default',['paginator' => $tunjangans])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to divisions.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('tunjangans.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div>
@endsection