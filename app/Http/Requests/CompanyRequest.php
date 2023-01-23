<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'coord' => 'nullable|string|starts_with:[|ends_with:]',
            'logo' =>[
                'nullable',
                Rule::dimensions()->minWidth(100)->minHeight(100)
            ]
        ];
    }
}
