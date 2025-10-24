<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; // pakai tabel admins

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
