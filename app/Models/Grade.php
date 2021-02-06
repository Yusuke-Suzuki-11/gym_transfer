<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function getCourseRowsetByRow()
    {
        return $this->hasMany('App\Course');
    }
}
