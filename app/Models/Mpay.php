<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpay extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'date',
        'data',
    ];
}
