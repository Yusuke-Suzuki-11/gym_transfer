<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
}