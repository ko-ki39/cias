<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function secretQuestion(){

        return view('auth/passwords/secret_question');
    }

    public function secretQuestionAnswer(Request $request){
        if ($request->isMethod('post') == false) {
            return redirect()->route('top');
        }
        $user = DB::table('users')->where('user_id', $request->user_id)->first();
        if($user){
            if($request->secret_question_id == $user->secret_question_id && $request->secret_answer == $user->secret_answer){
                //対象のユーザーのsecret_question_idとsecret_answerが一致した場合
                $id = $user->id;
                return view('auth/passwords/change', compact('id'));
            }else {
                return redirect('login');
            }
        }else{
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

    public function changePassword(Request $request){
        if ($request->isMethod('post') == false) {
            return redirect()->route('top');
        }else{
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'password' => 'required', 'string', 'alpha_num', 'min:8', 'confirmed',
                'password_confirmation' => 'required',
            ]);
            $id = $request->id;
            if($validator->fails()){ //エラーが出た場合の処理
                return view('auth/passwords/change', compact('id'));
            }else{
                $change_password =[
                    'password' => Hash::make($request->password),
                ];
                User::where('id', $id)->update($change_password);
                redirect('login');
            }
        }
// dd($request);
        // $validator = Validator::make($request->all(),[
        //     'id' => 'required',
        //     'password' => 'required|confirmed',
        //     'password_confirmation' => 'required',
        // ]);
        // $request->validate([
        //     'id' => 'required',
        //     'password' => 'required|confirmed',
        //     'password_confirmation' => 'required',
        // ]);
        // dd('ok');

    }
}
