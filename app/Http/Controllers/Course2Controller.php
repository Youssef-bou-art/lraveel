<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course2;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Response;

class Course2Controller extends Controller
{
    // عرض جميع العناصر
   

public function download($id)
{
    $course = Course2::findOrFail($id);
    $filePath = storage_path('app/public/' . $course->pdf);

    $filename = str_replace(' ', '_', $course->name) . '.pdf';

    return Response::download($filePath, $filename);
}

    public function index()
    {
        $courses = Course2::all();
        return view('user/cours2', compact('courses'));
    }

    // نموذج الإضافة
    public function create()
    {
        return view('course2s.create');
    }

    // تخزين عنصر جديد
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

        Course2::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('course2.index')->with('success', 'تمت الإضافة بنجاح!');
    }

    // عرض عنصر واحد
    public function show($id)
    {
        $course = Course2::findOrFail($id);
        return view('course2.show', compact('course'));
    }

    // نموذج التعديل
    public function edit($id)
    {
        $course = Course2::findOrFail($id);
        return view('course2.index', compact('course'));
    }

    // تحديث عنصر
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $course = Course2::findOrFail($id);

        if ($request->hasFile('pdf')) {
            if ($course->pdf) {
                Storage::disk('public')->delete($course->pdf);
            }
            $course->pdf = $request->file('pdf')->store('pdfs', 'public');
        }

        $course->name = $request->name;
        $course->save();

        return redirect()->route('course2.index')->with('success', 'تم التحديث بنجاح!');
    }

    // حذف عنصر
    public function destroy($id)
    {
        $course = Course2::findOrFail($id);

        if ($course->pdf) {
            Storage::disk('public')->delete($course->pdf);
        }

        $course->delete();

        return redirect()->route('course2.index')->with('success', 'تم الحذف بنجاح!');
    }
}
