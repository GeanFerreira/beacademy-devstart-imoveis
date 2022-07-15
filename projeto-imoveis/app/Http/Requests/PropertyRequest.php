<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => 'bail|required|min:3|max:100',
            'city_id' => 'bail|required|integer',
            'type_id' => 'bail|required|integer',
            'goal_id' => 'bail|required|integer',
            'preco' => 'bail|required|numeric|min:0',
            'dormitorios' => 'bail|required|integer|min:0',
            'salas' => 'bail|required|integer|min:0',
            'terreno' => 'bail|required|integer|min:0',
            'banheiros' => 'bail|required|integer|min:0',
            'garagens' => 'bail|required|integer|min:0',
            'descricao' => 'bail|nullable|string',
            'rua' => 'bail|required|min:1|max:100',
            'numero' => 'bail|required|integer',
            'complemento' => 'bail|nullable|string',
            'bairro' => 'bail|required|min:3|max:50',
            'neighborhoods' => 'bail|nullable|array',
        ];
    }

    /*
     * Customização campo obrigatório de erro
     */

    public function attributes()
    {
        return [
            'title' => 'título',
            'city_id' => 'cidade',
            'type_id' => 'tipo de imóvel',
            'goal_id' => 'finalidade',
            'preco' => 'preço',
            'dormitorios' => 'quantidade de dormitórios',
            'salas' => 'quantidade de salas',
            'banheiros' => 'quantidade de banheiros',
            'garagens' => 'vagas de garagem',
            'numero' => 'número',
            'terreno' => 'área em m²'
        ];
    }

    /*
     * Customização mensagem de erro
     */

    public function messages()
    {
        return [
            'goal_id.required' => 'Favor selecione uma opção'
        ];
    }
}
