<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'cities.fetch' => $this->fetchRule(),
            default => [],
        };
    }

    /**
     * Fetching rule via API
     */
    private function fetchRule(): array
    {
        return [
            'state_id' => ['required', 'integer']
        ];
    }
}
