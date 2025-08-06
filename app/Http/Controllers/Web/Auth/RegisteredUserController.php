<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.layouts.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'first_name'            => ['required', 'string', 'max:100'],
            'last_name'             => ['required', 'string', 'max:100'],
            'number'                => ['required', 'numeric','unique:' . User::class],
            'terms_and_policy'      => ['nullable', 'numeric'],
            'promotion_permission'  => ['nullable', 'numeric'],
            'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'number'                => $request->number,
            'email'                 => $request->email,
            'terms_and_policy'      => $request->terms_and_policy === null ? 0 : (int) $request->terms_and_policy,
            'promotion_permission'  => $request->promotion_permission === null ? 0 : (int) $request->promotion_permission,
            'password'              => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Check the user's role after login to redirect accordingly
        if ($user->role == 'admin') {
            // Redirect to admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        } else {
            // Redirect to user dashboard if the user is not an admin
            return redirect()->route('user.dashboard');
        }

    }

}
