<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreagentRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '代理店名を入力してください。',
            'name.max' => '100⽂字未満で⼊⼒してください',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
        ];
    }
}
