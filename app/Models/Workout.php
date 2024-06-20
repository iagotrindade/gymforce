<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
        'user_id',
        'image_id'
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public function workoutProgress(): HasMany
    {
        return $this->hasMany(WorkoutProgress::class);
    }
}
