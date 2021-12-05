<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\TagRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class ArticleRequest extends FormRequest
{
    use TagRequestTrait;

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
            'slug' =>  in_array($this->getMethod(), ['PATCH', 'PUT']) ? 'required|exists:articles,slug' : 'required|unique:articles',
            'title' => 'required|min:5|max:100',
            'mini_description' => 'required|max:255',
            'description' => 'required',
            'is_published' => 'required|in:1,0',
            'tags' => 'nullable|string'
        ];
    }
}
