<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'long_url' => ['required', 'url', 'active_url', 'max:2083'],
            'alias' => ['nullable','unique:short_urls,alias','unique:short_urls,code', 'alpha_dash', 'max:30']
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
            'alias.alpha_dash' => 'The :attribute may only contain letters, numbers, dashes, and underscores.',
            'long_url.url' => 'The URL format is invalid.',
            'long_url.active_url' => 'The URL is not active.',
        ];
    }
}
