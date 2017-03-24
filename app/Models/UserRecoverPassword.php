<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRecoverPassword extends Model
{
    protected $table = 'user_recover_password';

    protected $fillable = [
        'email', 'user_id', 'token'
    ];

}
