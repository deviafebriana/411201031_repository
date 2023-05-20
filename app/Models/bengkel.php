<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bengkel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kode_barang', 'nama_barang', 'deskripsi', 'stok_barang', 'harga_barang'];
    protected $table = 'bengkel';
    public $timestamps = false;
}
