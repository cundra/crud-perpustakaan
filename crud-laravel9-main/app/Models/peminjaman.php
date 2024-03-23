<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_buku_id',
        'id_peminjam',
        'tanggal_peminjaman',
        'tanggal_kembali'];
    protected $table = 'peminjaman';
    public $timestamps = false;

public function anggota()
{
return $this->belongTo(peminjaman::class);

}
}