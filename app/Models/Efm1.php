<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efm1 extends Model
{
    use HasFactory;
    protected $table = 'efm1s';
    protected $fillable = ['name', 'pdf'];
}

