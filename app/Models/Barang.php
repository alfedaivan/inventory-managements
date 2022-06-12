<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'namaBarang',
        'harga',
        'stok',
        'tglUpdate',
        'supplier_id',
        'kategori_id',
        'created_at',
        'updated_at'
    ];
}
