<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        $id = $this->id ?? '';
        $rules = [
            'name' => "bail|required|min:3|max:100|unique:cities,name,$id"
        ];

        if($this->method('PUT')){
            $rules['name'] = [
                'nullable'
            ];
        }
        return $rules;
    }
}
