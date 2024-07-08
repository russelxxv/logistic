<?php

namespace App\Http\Requests;

use App\Rules\DbVarcharMaxLength;
use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\Rules\Phone as PhoneRule;

class CustomerRequest extends FormRequest
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
            'customer.store' => $this->storeRules(),
            default => [],
        };
    }

    /**
     * Store Rules
     */
    private function storeRules(): array
    {
        return [
            'first_name' => ['required', 'string', new DbVarcharMaxLength()],
            'last_name' => ['required', 'string', new DbVarcharMaxLength()],
            'middle_name' => ['nullable', 'string', new DbVarcharMaxLength()],
            'retailer_name' => ['nullable', 'string', new DbVarcharMaxLength()],
            'phone' => [
                'required',
                'unique:customers,phone',
                // 'phone:US'
                // (new PhoneRule())->country('US')->type('fixed_line_or_mobile'),
            ],
            'email' => ['required', 'email', 'unique:customers,email'],
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
            'postal_code' => ['required', new DbVarcharMaxLength()],
            'address_line' => ['required', 'string'],
            'country' => ['required', 'exists:countries,id']
        ];
    }

    /**
     * Custome error message
     */
    public function messages(): array
    {
        return [
            'phone' => 'Phone number is invalid'
        ];
    }
}
