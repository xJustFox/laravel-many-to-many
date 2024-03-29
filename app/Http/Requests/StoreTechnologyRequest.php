<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
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
            'name'  => 'required|max:100|unique:technologies',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Il campo Name Technology è obbligatorio.',
            'name.max'              => 'Il campo deve avere massimo 100 caratteri',
            'name.unique'           => 'Esiste già un tipo con questo nome',
        ];
    }
}
