@extends('layouts.utama')

@section('content')

<!-- <input type="button" href="/jadwal/create" value="Insert baru"> -->
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Potongan</div>
<div class="card-body">
<a href="/potongan/create">
<button class="btn btn-info" id="sidebarToggle">
    <i class="far fa-plus-square"> Tambahkan Potongan</i>
</button></a>

<br><br>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Potongan</th>
            <th>Jumlah Potongan</th>
            <th colspan="2">Action</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($potongan as $potongan)
       <tr>
            <td>{{ $potongan->id }}</td>
            <td>{{ $potongan->nama_potongan }}</td>
            <td>{{ $potongan->jml_potongan }}</td>
            <td><a href="potongan/delete/{{$potongan->id}}">Delete</a> </td>
            <td><a href="potongan/edit/{{$potongan->id}}">Edit</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div>
@endsection()