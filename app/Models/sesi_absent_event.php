<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sesi_absent_event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_event',
        'title',
        'time_start',
        'time_end',
    ];
}
