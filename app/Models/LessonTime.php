<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTime extends Model
{
    use HasFactory;

    public function weeks()
    {
        return $this->belongsToMany('App\Models\LessonTime', 'lesson_time_week', 'lesson_times_id', 'weeks_id');
    }

}
