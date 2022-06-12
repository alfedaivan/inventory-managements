<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Users;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $fillable = [
        'barang_id',
        'tglKeluar',
        'jmlBarang',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'namaBarang');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'nama');
    }
}
