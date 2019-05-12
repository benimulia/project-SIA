@extends('layouts.utama')

@section('content')

<!-- <input type="button" href="/jadwal/create" value="Insert baru"> -->
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Divisi</div>
<div class="card-body">
<a href="/divisi/create">
<button class="btn btn-info" id="sidebarToggle">
    <i class="far fa-plus-square"> Tambahkan Divisi</i>
</button></a>

<br><br>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Divisi</th>
            <th colspan="2">Action</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($divisi as $bagian)
       <tr>
            <td>{{ $bagian->id }}</td>
            <td>{{ $bagian->nama_divisi }}</td>
            <td><a href="divisi/delete/{{$bagian->id}}">Delete</a> </td>
            <td><a href="divisi/edit/{{$bagian->id}}">Edit</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div>
@endsection()