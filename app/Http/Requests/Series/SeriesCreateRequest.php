<?php

namespace App\Http\Requests\Series;

use Illuminate\Foundation\Http\FormRequest;

class SeriesCreateRequest extends FormRequest
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
            'name' => ['required','min:3'],
            'seasonsQuantity' => ['required','integer', 'min:1'],
            'episodesPerSeason' => ['required','integer', 'min:1'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'seasonsQuantity.required' => 'Numero de temporadas e obrigatorio',
            'seasonsQuantity.numeric' => 'Numero de temporadas deve ser um numero',
            'seasonsQuantity.min' => 'Numero deve ser maior que 0',
            'episodesPerSeason.required' => 'Numero de episodios por temporadas e obrigatorio',
            'episodesPerSeason.numeric' => 'Numero de episodios por temporadas deve ser um numero',
            'episodesPerSeason.min' => 'Numero deve ser maior que 0',
        ];
    }
}
