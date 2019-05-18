@extends('layouts.utama')

@section('content')
<div class="container">
  <form action="/potongan/edit/{{$potongan->id}}" method="post" class="was-validated">
  {{ csrf_field() }}
    <div class="form-group">
      <label for="nama_potongan">Nama Potongan</label>
      <input type="text" class="form-control" id="nama_potongan" placeholder="Masukkan Nama Potongan" name="nama_potongan" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="jml_potongan">Jumlah Potongan</label>
      <input type="number" class="form-control" id="jml_potongan" placeholder="Angka" name="jml_potongan" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"> <input type="reset" class="btn btn-primary" value="Reset" >
  </form>
</div>

@endsection()