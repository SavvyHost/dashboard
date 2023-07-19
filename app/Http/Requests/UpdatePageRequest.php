<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
			'name' => 'required|string',
			'searchable' => 'required|bool',
			"seo_title" => "nullable|string",
			"seo_description" => "nullable|string",
			"facebook_title" => "nullable|string",
			"facebook_description" => "nullable|string",
			"twitter_title" => "nullable|string",
			"twitter_description" => "nullable|string",
			"publish" => "nullable|string",
			"header_style" => "required|string",
			'featured_image' => 'nullable|image',
			'facebook_image' => 'nullable|image',
			'twitter_image' => 'nullable|image',
			'logo' => 'nullable|image',
		];
    }
}
