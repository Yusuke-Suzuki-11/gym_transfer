<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    protected $table = 'course_student';

    protected $fillable = [
        'transfer_enabled',
    ];

    public function hasTransferEnabled($studentId, $courseId)
    {
        $item = $this->all()->where('student_id', $studentId)->where('course_id', $courseId)->first();
        return !isset($item) || $item->transfer_enabled == 0 ? false : true;
    }

    public function transferEnabledByIdAndStudentId($studentId, $courseId)
    {
        $this->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first()
            ->update(['transfer_enabled' => 0]);
    }
}
