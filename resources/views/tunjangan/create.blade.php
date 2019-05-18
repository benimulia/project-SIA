@extends('layouts.utama')

@section('content')
<div class="container">
  <form action="/tunjangan/create" method="post" class="was-validated">
  {{ csrf_field() }}
    <div class="form-group">
      <label for="nama_tunjangan">Nama Tunjangan</label>
      <input type="text" class="form-control" id="nama_tunjangan" placeholder="Masukkan Nama Tunjangan" name="nama_tunjangan" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="jml_tunjangan">Jumlah Tunjangan</label>
      <input type="text" class="form-control" id="jml_tunjangan" placeholder="Angka" name="jml_tunjangan" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"> <input type="reset" class="btn btn-primary" value="Reset" >
  </form>
</div>

@endsection()