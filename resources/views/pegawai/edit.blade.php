@extends('layouts.utama')

@section('content')
<div class="container">
  <form action="/pegawai/edit/{{$pegawai->id}}" method="post" class="was-validated">
  {{ csrf_field() }}
  <div class="form-group">
      <label for="nama_pegawai">Nama</label>
      <input type="text" class="form-control" id="nama_pegawai" placeholder="Masukkan Nama Pegawai" name="nama_pegawai" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="alamat_pegawai">Alamat</label>
      <input type="text" class="form-control" id="alamat_pegawai" placeholder="Masukkan Alamat Pegawai" name="alamat_pegawai" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tgl_lahir"name="tgl_lahir" required>
    </div>
    <div class="form-group">
      <label for="tgl_masuk">Tanggal Masuk</label>
      <input type="date" class="form-control" id="tgl_masuk"name="tgl_masuk" required>
    </div>
    <div class="form-group">
      <label for="jabatan_pegawai">Jabatan :</label>
        <select class="form-control" id="jabatan_pegawai" name="jabatan_pegawai">
            <option>Trainee</option>
            <option>Pegawai</option>
            <option>Kepala Divisi</option>
            <option>CEO</option>
        </select>
    </div>
    <div class="form-group">
        <label for="divisi_pegawai">Divisi :</label>
        <select class="form-control" id="divisi_pegawai" name="divisi_pegawai">
            <option>IT</option>
            <option>Marketing</option>
            <option>Hubungan International</option>
            <option>Desain</option>
        </select>
    </div>
        <label for="picture">Upload Photo</label><br/>
        <input type="file" name="picture" id="picture"><br/><br/>
    <input type="submit" class="btn btn-primary" value="Submit"> <input type="reset" class="btn btn-primary" value="Reset" >
  </form>
</div>

@endsection()