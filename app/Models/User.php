<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {

    use HasFactory;
    use HasRoles;

    protected $fillable = [
      'user',
      'username',
      'password',
      'email',
      'state',
      'rememberToken',
    ];
}
