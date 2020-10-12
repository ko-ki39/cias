<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
// use Dotenv\Validator;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function secretQuestion()
    {

        return view('auth/passwords/secret_question');
    }

    public function secretQuestionAnswer(Request $request)
    {
        $user = DB::table('users')->where('user_id', $request->user_id)->first();
        if ($user) {
            if ($request->secret_question_id == $user->secret_question_id && $request->secret_answer == $user->secret_answer) {
                //対象のユーザーのsecret_question_idとsecret_answerが一致した場合
                $id = $user->id;
                $secret_answer = $request->secret_answer;
                $secret_question_id = $request->secret_question_id;
                return view('auth/passwords/change', compact('id', 'secret_answer', 'secret_question_id'));
            } else {
                return redirect('login');
            }
        } else {
            //ログインIDが存在しない場合
            return redirect('login');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function changePassword(ChangePasswordRequest $request)
    {
        $validator = $request->getValidator();

        if($validator->fails()){
            return redirect('login');
        }
        if ($request->isMethod('post') == false) {
            return redirect()->route('top');
        } else {
            $id = $request->id;
            $change_password = [
                'password' => Hash::make($request->password),
            ];
            User::where('id', $id)->update($change_password);
            redirect('login');
            return redirect()->route('top');
        }
    }
}
