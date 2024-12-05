<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharMatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'input_one' => ['required', 'string', 'min:5'],
            'input_two' => ['required', 'string', 'min:5'],
        ];
    }
}
