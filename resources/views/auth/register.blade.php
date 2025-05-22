<x-guest-layout>
    <div style="min-height: 100vh; background-color: black; display: flex; justify-content: center; align-items: center; padding: 20px;">
        <form method="POST" action="{{ route('register') }}" style="background-color: white; padding: 30px; border-radius: 10px; width: 100%; max-width: 400px; color: black; box-shadow: 0 0 10px rgba(255, 165, 0, 0.3);">
            @csrf

            <h2 style="text-align: center; margin-bottom: 20px; color: orange;">Register</h2>

            <!-- Name -->
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; color: orange;">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: orange;">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px; color: orange;">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px; color: orange;">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('login') }}" style="color: orange; font-size: 14px;">{{ __('Already registered?') }}</a>

                <button type="submit" style="background-color: orange; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
                    {{ __('Register') }}
                </button>
            </div>

            <div style="text-align: center; margin-top: 15px;">
                <a href="{{ route('login') }}" style="color: orange;">Login</a>
            </div>
        </form>
    </div>
</x-guest-layout>
