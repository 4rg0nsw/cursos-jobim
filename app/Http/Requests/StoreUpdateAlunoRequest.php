<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAlunoRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:5|max:100!unique',
            'data' => 'nullable|min:10|max:10', 
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Campo nome é obrigatório',
            'name.min' => 'Ops! Nome muito curto',
            'email.required' => 'Campo email é obrigatório',
            'email.min' => 'Ops! email muito curto', 
            'data.min' => 'Ops! Não esqueça do formato: 10/01/1990 ', 
        ];
    }

}
