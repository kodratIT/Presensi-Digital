<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataPeserta extends Model
{
    use HasFactory;
    public $table = "data_kehadiran";
    public $guarded = ['id'];
}
