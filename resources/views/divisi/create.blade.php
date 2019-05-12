@extends('layouts.utama')

@section('content')
<div class="container">
  <form action="/divisi/create" method="post" class="was-validated">
  {{ csrf_field() }}
    <div class="form-group">
      <label for="nama_divisi">Nama Divisi</label>
      <input type="text" class="form-control" id="nama_divisi" placeholder="Masukkan Nama Divisi" name="nama_divisi" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"> <input type="reset" class="btn btn-primary" value="Reset" >
  </form>
</div>

@endsection()