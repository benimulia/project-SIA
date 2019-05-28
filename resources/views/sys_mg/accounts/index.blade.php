@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Manajemen Akun</h4>
    
    <form action="{{route('accounts.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search Akun</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <button type="submit" class="btn waves-effect waves-light">Search</button>                            
                        </form>
    
    <div class="row">
        {{-- Show All Accounts List as a Card --}}
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Daftar Akun</h5>
                    {{-- Table that shows Accounts List --}}
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>Kode Akun</th>
                                <th>Nama Akun</th>
                                <th>Keterangan</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="dept-table">
                            {{-- Check if there are any accounts to render in view --}}
                            @if($accounts->count())
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{$account->account_id}}</td>
                                        <td>{{$account->nama}}</td>
                                        <td>{{$account->keterangan}}</td>
                                        <td>{{$account->created_at}}</td>
                                        <td>{{$account->updated_at}}</td>
                                        <td>
                                            <div class="row mb-0">
                                              <div class="col">
                                                    {{-- 
                                                        Edit button will navigate us to accounts.edit
                                                        for defining a route you can use route method
                                                        route('route name') or if you want to pass data like
                                                        below then use route('route name',$data)
                                                     --}}
                                                    <a href="{{route('accounts.edit',$account->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    {{-- 
                                                        Delete button will navigate us to accounts.destroy
                                                     --}}
                                                    <form action="{{route('accounts.destroy',$account->id)}}" method="POST">
                                                        {{--
                                                            @method('DELETE') is a hidden input that we need
                                                            to make a Delete request because html doesn't support
                                                            DELETE and PUT methods
                                                        --}}
                                                        @method('DELETE')
                                                        {{--
                                                            @csrf() is also a hidden input that renders the csrf token
                                                            for security
                                                        --}}
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                {{-- if there are no account then show this message --}}
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">Data akun tidak dtiemukan!</h6></td>
                                </tr>
                            @endif
                            @if(isset($search))
                                <tr>
                                    <td colspan="3">
                                        <a href="/accounts" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- Accounts Table END --}}
                </div>
                {{-- Show Pagination Links --}}
                <div class="center" id="pagination">
                  {{$accounts->links('vendor.pagination.default',['paginator' => $accounts])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


{{-- This is the button that is located at the bottom right, that navigates us to accounts.create view --}}
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('accounts.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection