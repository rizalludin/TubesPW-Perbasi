<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'waktu', 'team','harga'
    ];
    protected $dates = ['deleted_at'];
}
