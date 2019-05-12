@extends('layouts.utama')

@section('content')

<!-- <input type="button" href="/jadwal/create" value="Insert baru"> -->
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Jabatan</div>
<div class="card-body">
<a href="/jabatan/create">
<button class="btn btn-info" id="sidebarToggle">
    <i class="far fa-plus-square"> Tambahkan Jabatan</i>
</button></a>

<br><br>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jabatan</th>
            <th colspan="2">Action</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($jabatan as $pangkat)
       <tr>
            <td>{{ $pangkat->id }}</td>
            <td>{{ $pangkat->nama_jabatan }}</td>
            <td><a href="jabatan/delete/{{$pangkat->id}}">Delete</a> </td>
            <td><a href="jabatan/edit/{{$pangkat->id}}">Edit</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div>
@endsection()