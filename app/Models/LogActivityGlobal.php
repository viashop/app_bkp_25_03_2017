<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivityGlobal extends Model
{

    protected $fillable = [
        'user_id',
        'shop_id',
        'activity_log_type_id',
        'reference_table_type',
        'reference_old',
        'reference_new',
        'request_header',
        'ip'
    ];

}
