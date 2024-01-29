<?php

namespace Inveteratus\Neon\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inveteratus\Neon\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        if (! Auth::attempt($request->only(['email', 'password']))) {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }
}
