@extends('layouts.utama')

@section('content')

<!-- <input type="button" href="/jadwal/create" value="Insert baru"> -->
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Tunjangan</div>
<div class="card-body">
<a href="/tunjangan/create">
<button class="btn btn-info" id="sidebarToggle">
    <i class="far fa-plus-square"> Tambahkan Tunjangan</i>
</button></a>

<br><br>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Tunjangan</th>
            <th>Jumlah Tunjangan</th>
            <th colspan="2">Action</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($tunjangan as $tunjangan)
       <tr>
            <td>{{ $tunjangan->id }}</td>
            <td>{{ $tunjangan->nama_tunjangan }}</td>
            <td>{{ $tunjangan->jml_tunjangan }}</td>
            <td><a href="tunjangan/delete/{{$tunjangan->id}}">Delete</a> </td>
            <td><a href="tunjangan/edit/{{$tunjangan->id}}">Edit</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div>
@endsection()