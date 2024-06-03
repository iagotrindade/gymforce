<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkoutExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'series',
        'reps',
        'reccomended_weight',
        'user_id',
        'workout_id',
        'exercise_id'
    ];

    public function exercise(): hasOne {
        return $this->hasOne(Exercise::class, 'id', 'exercise_id');
    }
}
