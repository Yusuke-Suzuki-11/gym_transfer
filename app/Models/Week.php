<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Week extends Model
{
    use HasFactory;

    public function lesson_times()
    {
        return $this->belongsToMany("App\Models\LessonTime", 'lesson_time_week', 'weeks_id', 'lesson_times_id');
    }
}
