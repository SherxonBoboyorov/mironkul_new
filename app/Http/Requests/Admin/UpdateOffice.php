<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOffice extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title_ru' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'addres_ru' => 'required|string|max:255',
            'addres_uz' => 'required|string|max:255',
            'addres_en' => 'required|string|max:255',
            'gmail' => 'required|string|max:255',
            'second_number' => 'required|string|max:255',
            'second_gmail' => 'required|string|max:255',
            'map' => 'required',
        ];
    }
}
