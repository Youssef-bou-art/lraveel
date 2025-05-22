<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Efm1Controller;
use App\Http\Controllers\Efm2Controller;
use App\Http\Controllers\Co1Controller;
use App\Http\Controllers\Course2Controller;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    if (Auth::check() && Auth::user()->email === config('admin.email')) {
        return redirect()->route('admin.dashboard');
    }
    return view('user/home');
})->name('home');







// routes/web.php

use App\Http\Controllers\AdminController;


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


// Route لعرض الدورات
// Route لعرض صفحة الدورات


// Route لعرض صفحة إضافة الدورة (الـ Modal)
Route::get('/courses/create', function () {
    return view('admin.ajouter'); // تأكد من أن هذه هي اسم صفحة إضافة الدورة
})->name('courses.create');

// Route لمعالجة إضافة الدورة (POST)
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');







Route::middleware('auth')->group(function () {
       Route::get('/ce', function (\Illuminate\Http\Request $request) {
    if ($request->query('source') === 'home' &&Auth::check() && Auth::user()->email === config('admin.email')) {
        return redirect()->route('admin.dashboard');
    }
    return view('user.ce'); // تأكد أن العرض "user.ce" موجود
})->name('ce.page');

Route::get('/ce2', function (\Illuminate\Http\Request $request) {

    if ($request->query('source') === 'home' && Auth::check() && Auth::user()->email === config('admin.email')) {
        return redirect()->route('admin.dashboard');
    }
    return view('user/ce2');
})->name('ce2.page');
Route::middleware(['auth'])->group(function () {
            Route::resource('efm1',Efm1Controller::class);
            Route::resource('efm2',Efm2Controller::class);
            Route::resource('course1',Co1Controller::class);
            Route::resource('course2',Course2Controller::class);
});

            // عرض الـ form ديال التعديل
Route::put('course2/{id}', [Course2Controller::class, 'update'])->name('course2.update');


Route::put('efm1/{id}', [Efm1Controller::class, 'update'])->name('efm1.update');








});







Route::get('/home', function () {
    return view('user/home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});



Route::get('/course1/download/{id}', [Co1Controller::class, 'download'])->name('course1.download');
Route::get('/course2/download/{id}', [Course2Controller::class, 'download'])->name('course2.download');

Route::get('/efm1/download/{id}', [Efm1Controller::class, 'download'])->name('efm1.download');

Route::get('/efm2/download/{id}', [Efm2Controller::class, 'download'])->name('efm2.download');


require __DIR__.'/auth.php';
