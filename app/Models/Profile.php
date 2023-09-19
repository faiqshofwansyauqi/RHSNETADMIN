<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'voucher';

    protected $fillable = [
        'id',
        'namaprofile',
        'kodemikhon',
        'speed',
        'kuota',
        'durasi',
        'satuandurasi',
        'harga',
        'jumlah',
    ];

    // protected $guarded = [];
}
