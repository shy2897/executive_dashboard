<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'date',
        'data',
    ];

    public function scopeInflow($query)
    {
        return $query->where('description', 'INR Inflow (in million)');
    }
}
