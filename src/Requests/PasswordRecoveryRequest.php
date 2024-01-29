<?php

namespace Inveteratus\Neon\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 */
class PasswordRecoveryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
