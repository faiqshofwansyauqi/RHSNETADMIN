<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history'; 
    protected $fillable = [
        'id',
        'id_lokasi',
        'code',
        'payment_url',
        'method',
        'crm_name',
        'crm_email',
        'price',
        'paid',
        'duitku_ref',
        'type',
    ];
}
