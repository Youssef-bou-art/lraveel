<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * عرض لوحة التحكم الخاصة بالـ Admin.
     */
    public function index()
    {
        // يمكنك إضافة أي منطق تحتاجه لعرض معلومات أو إحصائيات معينة في لوحة التحكم هنا.
        return view('admin.dashboard'); // تأكد من أنك قد أنشأت هذا العرض في resources/views/admin/dashboard.blade.php
    }
}
