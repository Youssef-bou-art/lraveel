<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
  public function showProfile()
{
    if (!auth()->check()) {
        return redirect()->route('home'); // التوجيه إذا لم يكن المستخدم مسجلًا
    }

    $user = auth()->user();
    return view('admin.dashboard', compact('user'));
}



    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */


public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return back()->with('status', 'Nom et email modifiés avec succès.');
}
public function updatePassword(Request $request)
{
    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    $request->validate([
        'password' => ['required', 'confirmed', Password::min(8)],
    ]);

    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('status', 'Le mot de passe a été changé avec succès.');
}




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
