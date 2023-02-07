<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'tsurname' => 'required|min:2|max:20',
            'tname' => 'required|min:2|max:15',
            'tthirdname' => 'min:5|max:25'
        ];
    }

    public function messages()
    {
        return [
            'tsurname.required' => 'Не введена фамилия преподавателя!',
            'tname.required' => 'Не введено имя преподавателя!'
        ];
    }
}
