<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'us-state.fetch' => $this->uSstateFetchRules(),
            'us-city.fetch' => $this->uSCityFetchRules(),
            // 'ph.fetch.provinces' => $this->pHFetchProvinceRules(),
            // 'ph.fetch.municipalities' => $this->pHFetchMunicipalitiesRules(),
            'ph.fetch.search_psgc' => $this->phSearchPsgc(),
            default => [],
        };
    }

    /**
     * US State fetch
     */
    private function uSstateFetchRules(): array
    {
        return [
            'country_id' => ['required', 'exists:countries,id']
        ];
    }

    /**
     * US City fetch rules
     */
    private function uSCityFetchRules(): array
    {
        return [
            'state_id' => ['required', 'exists:us_states,id']
        ];
    }

    /**
     * PH Fetch province Rules
     */
    private function pHFetchMunicipalitiesRules(): array
    {
        return [
            'region_id' => ['required', 'exists:ph_regions,id']
        ];
    }

    /**
     * PH City or Province Rules
     */
    private function phSearchPsgc(): array
    {
        return [
            'term' => ['required', 'string']
        ];
    }
}
