<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function ce()
    {
        return view('ce'); // عرض صفحة ce.blade.php
    }

    public function ce2()
    {
        return view('ce2'); // عرض صفحة ce2.blade.php
    }
}
