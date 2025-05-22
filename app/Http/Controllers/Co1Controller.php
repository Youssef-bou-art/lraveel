<?php

namespace App\Http\Controllers;

use App\Models\Course1; // إذا كنت تستخدم موديل Course1
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class Co1Controller extends Controller
{
    // عرض جميع الدورات




    

public function download($id)
{
    $course = Course1::findOrFail($id);
    $filePath = storage_path('app/public/' . $course->pdf);

    $filename = str_replace(' ', '_', $course->name) . '.pdf';

    return Response::download($filePath, $filename);
}

    public function index()
    {
        $courses = Course1::all();
        return view('user/cours1', compact('courses')); // تأكد أن view تم تعريفها في resources/views/course1s/index.blade.php
    }

    // عرض نموذج الإضافة
    public function create()
    {
        return view('course1.create'); // تأكد من إنشاء view في resources/views/course1s/create.blade.php
    }

    // تخزين دورة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }

        Course1::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('course1.index')->with('success', 'تمت إضافة الدورة بنجاح.');
    }

    // عرض دورة واحدة
    public function show($id)
    {
        $course = Course1::findOrFail($id);
        return view('course1.show', compact('course')); // تأكد من إنشاء view في resources/views/course1s/show.blade.php
    }

    // عرض نموذج التعديل
    public function edit($id)
    {
        $course = Course1::findOrFail($id);
        return view('course1.edit', compact('course1')); // تأكد من إنشاء view في resources/views/course1s/edit.blade.php
    }

    // تحديث دورة
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $course = Course1::findOrFail($id);

        if ($request->hasFile('pdf')) {
            if ($course->pdf) {
                Storage::disk('public')->delete($course->pdf);
            }
            $course->pdf = $request->file('pdf')->store('pdfs', 'public');
        }

        $course->name = $request->name;
        $course->save();

        return redirect()->route('course1.index')->with('success', 'تم تحديث الدورة بنجاح.');
    }

    // حذف دورة
    public function destroy($id)
    {
        $course = Course1::findOrFail($id);

        if ($course->pdf) {
            Storage::disk('public')->delete($course->pdf);
        }

        $course->delete();

        return redirect()->route('course1.index')->with('success', 'تم حذف الدورة بنجاح.');
    }
}
