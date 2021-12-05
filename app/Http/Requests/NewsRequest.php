<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\TagRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'description' => 'required',
            'tags' => 'nullable|string'
        ];
    }
}
