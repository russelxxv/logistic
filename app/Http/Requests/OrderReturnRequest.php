<?php

namespace App\Http\Requests;

use App\Rules\DbVarcharMaxLength;
use Illuminate\Foundation\Http\FormRequest;

class OrderReturnRequest extends FormRequest
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
        $routeNames = $this->route()->getName();

        return match ($routeNames) {
            'order-return.store' => $this->storeRules(),
            default => [],
        };
    }

    private function storeRules(): array
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
