<?php

namespace App\Http\Requests;

use App\Rules\DbVarcharMaxLength;
use Illuminate\Foundation\Http\FormRequest;

class ManageOrderReturnRequest extends FormRequest
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
            'manage-order-return.update' => $this->updateRules(),
            default => [],
        };
    }

    private function updateRules(): array
    {
        return [
            'order_number' => ['required', 'string', new DbVarcharMaxLength()],
            'product_category' => ['required', 'array'],
            'product_category.*' => ['required', 'exists:product_categories,id'],
            'item_number' => ['required', 'array'],
            'item_number.*' => ['required', 'max_digits:15'],
            'return_reason_id' => ['required', 'integer', 'exists:order_return_reasons,id'],
            'details' => ['nullable', 'string'],
        ];
    }
}
