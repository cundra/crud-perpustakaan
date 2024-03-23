@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form  action="{{ route('anggota.edit', ['id' => $data->id_anggota]) }}" method='post'>
    @csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
   
        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
        <div class="col-sm-10">
            {{ $data->id_anggota }}
        </div>
        <div class="mb-3 row">
        <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama_anggota' value="{{ $data->nama_anggota }}" id="nama_anggota">
        </div>
    </div>
   
</div>

<a href="{{ url('anggota') }}" class="btn btn-secondary"><<kembali></a>
    <div class="mb-3 row"> 
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
    </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection