<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioVideo extends FormRequest
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
            'portfolio_id' => 'required',
            'video' => 'required|file|mimetypes:video/mp4,mkv',
            'title_ru' => 'required|max:255',
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
        ];
    }
}
