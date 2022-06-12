<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Softdeletes;


class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = ['nama', 'noTelepon', 'alamat', 'email', 'password',];
    protected $primaryKey = 'id';

    protected $guarded = [
        'id'
    ];

    // protected $hidden = [
    //     'password'
    // ];

    public function getAuthPassword(){
        return $this->password;
    }
}
