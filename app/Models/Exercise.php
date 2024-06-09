<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rest',
        'exercise_medias_id'
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(ExerciseMedias::class, 'exercise_medias_id', 'id');
    }

    public function workoutData(): hasOne {
        return $this->hasOne(WorkoutExercise::class, 'exercise_id', 'id');
    }
}
