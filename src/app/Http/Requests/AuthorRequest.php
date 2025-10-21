<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'integer|min:0|max:150',
            'nationality' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'age.integer' => '数値を入力してください',
            'age.min' => '0以上の数値を入力してください',
            'age.max' => '150以下の数値を入力してください',
            'nationality.required' => '国籍を入力してください',
        ];
    }
    protected function getRedirectUrl() {
        return 'verror';
    }
}
