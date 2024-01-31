<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absents extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_absent_event',
        'id_user',
        'absent',
        'tipe',
    ];
}
