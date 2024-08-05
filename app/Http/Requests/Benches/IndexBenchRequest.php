<?php

namespace App\Http\Requests\Benches;

use Illuminate\Foundation\Http\FormRequest;

class IndexBenchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_start'   => ['nullable'],
            'date_end'     => ['nullable'],
            'technologies' => ['array'],
        ];
    }
}
