<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//ユーザーの登録等に使うバリデーションを行うクラス

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required|between: 3, 10|unique',
            'user_id' => 'required|between: 5, 15|unique',
            'password' => ['required', 'string', 'regex:/\A(?=.*?[a-zA-Z])(?=.*?\d)[a-zA-Z\d]{8,}+\z/'],  //アルファベット数字を最低一文字以上かつ8文字以上
            'email' => 'email',
            'secret_question_id' => 'required|between: 1, 6',
            'secret_answer' => 'required|between:3,30',
        ];
    }
}
