<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;

    protected $fillable = [
        'imc',
        'height',
        'weight',
        'waist',
        'hip',
        'arms',
        'legs',
        'thighs',
        'user_id',
    ];
}
