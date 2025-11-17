<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EditStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255',  Rule::unique('students','name')->ignore($this->route('id'), 'id')],
            'school_class_id'=>  ['required', 'integer', 'exists:school_classes,id'],
            'date_of_birth'=> 'nullable|date',
        ];
    }
}
