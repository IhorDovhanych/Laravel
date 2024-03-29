<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'lesson_name'=>['required', 'string'],
            'grade'=>['required', 'integer', 'min:0', 'max:100'],
            'grade_date'=>['required', 'date', 'before:tomorrow'],
            'student_id'=>['required', 'integer']
        ];
    }
}
