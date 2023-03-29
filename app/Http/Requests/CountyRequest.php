<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountyRequest extends FormRequest
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
            'ibge' => ['numeric','min:510001','max:519999'],
            'name' => ['string', 'min:3','max:255'],
            'microregion' => ['string', 'min:3','max:255'],
            'poleMunicipality' => ['string', 'min:3','max:255'],
            'macroregion' => ['string', 'min:3','max:255'],
            
        ];
    }

    public function attributes()
    {
        return [
            'ibge' => 'IBGE',
            'name' => 'NOME',
            'microregion' => 'MICRORREGIÃO',
            'poleMunicipality' => 'MUNICÍPIO PÓLO',
            'macroregion' => 'MICRORREGIÃO',
        ];
    }
}
