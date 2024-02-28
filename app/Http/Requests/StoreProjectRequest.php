<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name'              => 'required|max:150|unique:projects',
            'type_id'           => 'required|exists:types,id',
            'repository_link'   => 'required',
            'description'       => 'required',
            'date_start'        => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Il campo Name Project è obbligatorio.',
            'name.max'              => 'Il campo deve avere massimo 150 caratteri',
            'name.unique'           => 'Esiste già un progetto con questo nome',
            'type_id.required'      => 'Il campo Project Type è obbligatorio.',
            'type_id.exists'        => 'Il campo Project Type non è valido.',
            'link.required'         => 'Il campo Link Project è obbligatorio.',
            'description.required'  => 'Il campo Project Description è obbligatorio.',
            'date_start.required'   => 'Il campo Start Date Project è obbligatorio.',
            'date_start.date'       => 'Il campo Start Date Project non è valido.',
        ];
    }
}
