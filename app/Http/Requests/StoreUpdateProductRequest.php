<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
                'description' => 'nullable|min:3|max:10000',
                'photo' => 'required|image',            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'name.min' => 'Ops! Precisa informar no nome pelo menos 3 caracteres',
            'description.min' => 'Ops! Precisa informar na descrição pelo menos 3 caracteres',
            'photo.required' => 'Ops! Precisa informar uma imagem',

        ];
    }
}