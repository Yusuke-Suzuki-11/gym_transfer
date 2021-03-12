<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    private function getLevelRow()
    {
        return $this->hasOne('App\Models\ClassLevel', 'id')->first();
    }

    public function getLevel()
    {
        return $this->getLevelRow()->name;
    }
}
