<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('posts')->ignore($this->post),'min:3'],
            'description' => ['required', 'min:10'],
            'posted_by' => ['required', 'exists:users,id'],
            'image' => ['image', 'mimes:jpeg,png,jpg'],
        ];
    }
}
