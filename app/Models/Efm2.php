<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efm2 extends Model
{
    use HasFactory;
    protected $table = 'efm2s';
    protected $fillable = ['name', 'pdf'];
}
