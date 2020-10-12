<?php

namespace App\Http\Requests;

use App\Rules\NowPassword;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'now_password' => 'now_password',
            'password' => 'required|string|alpha_num|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(){
        return [
            'now_password.now_password' => 'パスワードが違います',
            'password.min' => '8文字以上入力してください',
            'password.confirmed' => 'パスワードが一致しません',
            'password.string' => '使えない文字列が入っています',
            'password.alpha_num' => '使えない文字列が入っています',
        ];

    }
    //バリデート失敗時の処理をオーバーライド
    protected function failedValidation(Validator $validator)
    {

    }

    //バリデートが失敗したか確認のメソッド
    public function getValidator(){
        return $this->validator;
    }

}
