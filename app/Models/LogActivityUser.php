<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivityUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'activity_log_type_id',
        'reference_table_type',
        'reference_old',
        'reference_new',
        'request_header'
    ];
}
