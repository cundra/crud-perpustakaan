@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form  action="{{ route('perpustakaan.edit', ['id' => $data->nomor_buku]) }}" method='post'>
    @csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
   
        <label for="nomor_buku" class="col-sm-2 col-form-label">Nomor Buku</label>
        <div class="col-sm-10">
            {{ $data->nomor_buku }}
        </div>
        <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='judul' value="{{ $data->judul }}" id="judul">
        </div>
</div>
   
</div>

<a href="{{ url('perpustakaan') }}" class="btn btn-secondary"><<kembali></a>
    <div class="mb-3 row"> 
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
    </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection