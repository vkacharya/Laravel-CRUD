<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        return [

            'name' => 'required',
            'email' => 'required|unique:students,email|email',
            'mobile' => 'required|numeric',
            'city' => 'required'

        ];
    }

    public function messages()
    {
        return [
            // to show custom validation for specific forms
            "email.email" => "email id is not valid"
        ];
    }

    public function attributes()
    {
        return [
            'mobile' => 'Mobile Number'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strtoupper($this->name)
        ]);
    }

}
