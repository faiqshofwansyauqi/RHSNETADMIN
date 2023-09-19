<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'id_lokasi',
        'name',
        'email',
        'phone',
        'totalprice',
        'status',
        'code',
        'created_at',
        'updated_at ',
    ];

    // protected $guarded = [];
}
