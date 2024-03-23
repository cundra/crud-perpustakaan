@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action="{{ url('anggota/store') }}"method='post'>
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('anggota') }}" class="btn btn-secondary">kembali</a>
    <div class="mb-3 row">
        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id_anggota' value="{{ Session::get('id_anggota') }}" id="id_anggota">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama_anggota' value="{{ Session::get('nama_anggota') }}" id="nama_anggota">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection