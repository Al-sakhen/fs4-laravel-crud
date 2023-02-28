<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:30'],
            'description' => 'required | min:10',
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "العنوان مطلوب ادخاله",
            'title.max' => "العنوان يجب ان يكون اقل من 30 حرف",
            'description.required' => "الوصف مطلوب ادخاله"
        ];
    }
}
