<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class DbVarcharMaxLength implements ValidationRule
{
    private string $db_max_varchar_length;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_max_varchar_length = 255;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // return Str::length($value) <= $this->db_max_varchar_length;
        if (Str::length($value) > $this->db_max_varchar_length) {
        }
    }
}
