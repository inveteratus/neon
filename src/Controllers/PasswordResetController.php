<?php

namespace Inveteratus\Neon\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inveteratus\Neon\Requests\PasswordResetRequest;

class PasswordResetController
{
    public function __invoke(PasswordResetRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                // event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? to_route('login')->with('status', 'Your password has been reset')
            : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
