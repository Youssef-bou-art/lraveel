<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course2 extends Model
{
     use HasFactory;

    protected $table = 'course2s';

    protected $fillable = ['name', 'pdf'];
}
