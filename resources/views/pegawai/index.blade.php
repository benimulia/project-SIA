@extends('layouts.utama')

@section('content')

<!-- <input type="button" href="/jadwal/create" value="Insert baru"> -->
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Pegawai</div>
<div class="card-body">
<a href="/pegawai/create">
<button class="btn btn-info" id="sidebarToggle">
    <i class="far fa-plus-square"> Tambahkan Pegawai</i>
</button></a>

<br><br>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pegawai</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tgl Lahir</th>
            <th>Tgl Masuk</th>
            <th>Jabatan</th>
            <th>Divisi</th>
            <th colspan="2">Action</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($pegawai as $pegawai)
       <tr>
            <td>{{ $pegawai->id }}</td>
            <td>{{ $pegawai->nama_pegawai }}</td>
            <td>{{ $pegawai->alamat_pegawai }}</td>
            <td>{{ $pegawai->tgl_lahir }}</td>
            <td>{{ $pegawai->tgl_masuk }}</td>
            <td>{{ $pegawai->jabatan_pegawai }}</td>
            <td>{{ $pegawai->divisi_pegawai }}</td>
            <td><a href="pegawai/delete/{{$pegawai->id}}">Delete</a> </td>
            <td><a href="pegawai/edit/{{$pegawai->id}}">Edit</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div>
@endsection()