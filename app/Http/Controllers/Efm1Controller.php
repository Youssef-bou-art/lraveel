<?php

namespace App\Http\Controllers;

use App\Models\Efm1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Response;


class Efm1Controller extends Controller
{
    // عرض جميع السجلات
    public function download($id)
{
    $item = Efm1::findOrFail($id);
    $filePath = storage_path('app/public/' . $item->pdf);

    if (!file_exists($filePath)) {
        abort(404, 'not found');
    }

    $filename = str_replace(' ', '_', $item->name) . '.pdf';

    return response()->download($filePath, $filename);
}

    public function index()
    {
        $items = Efm1::all();
        return view('user/efm1', ['items' => $items]);
    }

    // عرض الفورم لإضافة سجل جديد
    public function create()
    {
        return view('efm1.create');
    }

    // تخزين سجل جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pdfPath = $request->file('pdf')->store('efm1_pdfs', 'public');

        Efm1::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('efm1.index')->with('success', 'تمت الإضافة بنجاح');
    }

    // عرض سجل واحد
    public function show(Efm1 $efm1)
    {
        return view('efm1.show', compact('efm1'));
    }

    // عرض الفورم لتعديل سجل
    public function edit(Efm1 $efm1)
    {
        return view('efm1.edit', compact('efm1'));
    }

    // تحديث سجل
    public function update(Request $request, Efm1 $efm1)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($efm1->pdf);
            $data['pdf'] = $request->file('pdf')->store('efm1_pdfs', 'public');
        }

        $efm1->update($data);

        return redirect()->route('efm1.index')->with('success', 'تم التحديث بنجاح');
    }

    // حذف سجل
    public function destroy(Efm1 $efm1)
    {
        Storage::disk('public')->delete($efm1->pdf);
        $efm1->delete();

        return redirect()->route('efm1.index')->with('success', 'تم الحذف بنجاح');
    }
}
