<?php

namespace Inveteratus\Neon\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Inveteratus\Neon\Requests\PasswordRecoveryRequest;

class PasswordRecoveryController extends Controller
{
    public function __invoke(PasswordRecoveryRequest $request): RedirectResponse
    {
        Password::SendResetLink($request->only('email'));

        return back()
            ->with('status', 'A password reset link has been emailed to you')
            ->withInput($request->only('email'));
    }
}
