<?php

namespace App\Http\Requests;

use App\Rules\DbVarcharMaxLength;
use Illuminate\Foundation\Http\FormRequest;

class ManageCustomerRequest extends FormRequest
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
            'manage-customer.update' => $this->updateRules(),
            'manage-customer.address-update' => $this->updateAddressRules(),
            default => [],
        };
    }

    /**
     * Update rules for customer is life
     * Admin side is life
     */
    public function updateRules(): array
    {
        return [
            'first_name' => ['required', 'string', new DbVarcharMaxLength()],
            'last_name' => ['required', 'string', new DbVarcharMaxLength()],
            'middle_name' => ['nullable', 'string', new DbVarcharMaxLength()],
            'retailer_name' => ['nullable', 'string', new DbVarcharMaxLength()],
            'phone' => [
                'required',
                'unique:customers,phone,'.request('id'),
            ],
            'email' => ['required', 'email', 'unique:customers,email,'.request('id')],
        ];
    }

    /**
     * Update address rules
     */
    private function updateAddressRules(): array
    {
        return [
            'address_line' => ['required', 'string'],
            'city' => ['required', 'exists:cities,id'],
            'state' => ['required', 'exists:states,id'],
            'postal_code' => ['required', new DbVarcharMaxLength()],
            'country' => ['required', 'exists:countries,id']
        ];
    }
}
