@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action="{{ url('perpustakaan') }}"method='post'>
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('perpustakaan') }}" class="btn btn-secondary">Kembali</a>
    <div class="mb-3 row">
        <label for="nomor_buku" class="col-sm-2 col-form-label">Nomor Buku</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='nomor_buku' value="{{ Session::get('nomor_buku') }}" id="nomor_buku">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='judul' value="{{ Session::get('judul') }}" id="judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='pengarang' value="{{ Session::get('pengarang') }}" id="pengarang">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='tahun_terbit' value="{{ Session::get('tahun_terbit') }}" id="tahun_terbit">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="bahasa" class="col-sm-2 col-form-label">Bahasa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='bahasa' value="{{ Session::get('bahasa') }}" id="bahasa">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection