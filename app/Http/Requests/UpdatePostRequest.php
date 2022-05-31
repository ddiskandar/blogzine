<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'categoryId' => 'required',
            'thumbnail' => 'nullable|image|max:1024',
            'status' => 'required|in:draft,published'
        ];
    }
}
