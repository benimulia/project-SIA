@extends('layouts.utama')

@section('content')
<div class="container">
  <form action="/jabatan/create" method="post" class="was-validated">
  {{ csrf_field() }}
    <div class="form-group">
      <label for="nama_jabatan">Nama Jabatan</label>
      <input type="text" class="form-control" id="nama_jabatan" placeholder="Masukkan Nama Divisi" name="nama_jabatan" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"> <input type="reset" class="btn btn-primary" value="Reset" >
  </form>
</div>

@endsection()