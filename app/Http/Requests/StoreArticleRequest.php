<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:12|max:255',
            'slug' => 'nullable|string|min:12|max:255',
            'content' => 'nullable|string',
            'category_id'=> 'required|integer|exists:categories,id',
            'tags'=> 'nullable|string',
            'status'=> 'required|string',
            'show_image'=> 'required|boolean',
            'image' => 'nullable|image',
        ];
    }
}
