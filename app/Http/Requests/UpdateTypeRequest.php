<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'name'  => 'required|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Il campo Name Type è obbligatorio.',
            'name.max'              => 'Il campo deve avere massimo 100 caratteri',
        ];
    }
}
