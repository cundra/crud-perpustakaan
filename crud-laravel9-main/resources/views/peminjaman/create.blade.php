@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action="{{ url('peminjaman') }}"method='post'>
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('peminjaman') }}" class="btn btn-secondary">Kembali</a>
    <div class="mb-3 row">
        <label for="nomor_buku_id" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
        <div class="mb-3 row">
        <select class="form-control" name="nomor_buku_id" id="nomor_buku">
        @foreach ($perpus as $item)
        <option value="{{$item->nomor_buku}}">{{$item->judul}}</option>
        @endforeach
</select>   
                </div>
        </div>
    </div>
    <div class="mb-3 row">
                <label for="id_anggota" class="col-sm-2 col-form-label">Nama Peminjam</label>
                <div class="col-sm-10">
                <select class="form-control" name="id_peminjam" id="id_anggota">
        @foreach ($anggota as $item)
        <option value="{{$item->id_anggota}}">{{$item->nama_anggota}}</option>
        @endforeach
</select>

                </div>
            </div>
    <div class="mb-3 row">
        <label for="tanggal_peminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal_peminjaman' value="{{ Session::get('tanggal_peminjaman') }}" id="tanggal_peminjam">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal_kembali' value="{{ Session::get('tanggal_kembali') }}" id="tanggal_kembali">
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