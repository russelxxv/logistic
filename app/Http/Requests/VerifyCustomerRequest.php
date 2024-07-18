<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();
        return match ($routeName) {
            'verify.customer-email' => $this->verifyCustomerEmailRules(),
            default => [],
        };
    }

    private function verifyCustomerEmailRules(): array
    {
        return [
            'email' => ['required', 'email']
        ];
    }
}
