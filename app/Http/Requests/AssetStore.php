<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class AssetStore extends FormRequest
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
            'name' => 'required|string',
            'visible' => 'required|boolean',
            'file_path' => 'required_without:object|string',
            'object' => 'required_without:file_path|string',
            'location' => 'string',
            'type' => Rule::in(Asset::enum),
            'position' => 'string',
            'is_temple' => 'boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ],422));
    }
}
