<?php

namespace App\Http\Controllers;

use App\Models\Efm2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Response;


class Efm2Controller extends Controller
{
    // عرض كل السجل
    public function download($id)
{
    $item = Efm2::findOrFail($id);
    $filePath = storage_path('app/public/' . $item->pdf);

    if (!file_exists($filePath)) {
        abort(404, 'not found');
    }

    $filename = str_replace(' ', '_', $item->name) . '.pdf';

    return response()->download($filePath, $filename);
}

    // ات
    public function index()
    {
        $items = Efm2::all();
        return view('user/efm2', compact('items'));
    }

    // عرض الفورم لإنشاء سجل جديد
    public function create()
    {
        return view('efm2.create');
    }

    // تخزين سجل جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pdfPath = $request->file('pdf')->store('pdfs', 'public');

        Efm2::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('efm2.index')->with('success', 'تمت الإضافة بنجاح');
    }

    // عرض سجل معيّن
    public function show(Efm2 $efm2)
    {
        return view('efm2.show', compact('efm2'));
    }

    // عرض الفورم لتعديل سجل
    public function edit(Efm2 $efm2)
    {
        return view('efm2.edit', compact('efm2'));
    }

    // تحديث سجل
    public function update(Request $request, Efm2 $efm2)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('pdf')) {
            // حذف الملف القديم
            Storage::disk('public')->delete($efm2->pdf);
            // رفع الجديد
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }

        $efm2->update($data);

        return redirect()->route('efm2.index')->with('success', 'تم التحديث بنجاح');
    }

    // حذف سجل
    public function destroy(Efm2 $efm2)
    {
        // حذف الملف من التخزين
        Storage::disk('public')->delete($efm2->pdf);
        $efm2->delete();

        return redirect()->route('efm2.index')->with('success', 'تم الحذف بنجاح');
    }
}
