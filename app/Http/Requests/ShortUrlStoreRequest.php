<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\WithoutSpace;

class ShortUrlStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'long_url' => ['required', new WithoutSpace],
            'alias' => ['nullable','unique:short_urls,alias','unique:short_urls,code', new WithoutSpace, 'alpha_dash']
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'alias.alpha_dash' => 'The :attribute may only contain letters, numbers, dashes, and underscores.'
        ];
    }
}
