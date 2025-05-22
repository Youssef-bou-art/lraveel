<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course1 extends Model
{
     use HasFactory;

    protected $table = 'course1s';

    protected $fillable = ['name', 'pdf'];
}

