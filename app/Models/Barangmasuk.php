<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Users;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $fillable = [
        'barang_id',
        'supplier_id',
        'tglMasuk',
        'jmlBarang',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'namaBarang');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'nama');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'nama');
    }
}
