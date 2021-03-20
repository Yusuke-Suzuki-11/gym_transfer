<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class LessonDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'floor_flag',
        'bar_flag',
        'vaulting_flag',
        'trampoline_flag',
        'other_flag',
    ];

    public function hasFloorFlag($date)
    {
        return !is_null($this->where('date', $date)->first()->floor_flag);
    }
}
