<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use InterventionImage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'u_i_input' => ['file', 'image'],
            'user_id' => ['required', 'string', 'alpha_dash', 'max:25'],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'confirmed'],
            'user_name' => ['required', 'string', 'max:10', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'secret_question_id' => ['required', 'regex:/1|2|3|4|5|6/'],
            'secret_answer' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param   array   $data
     * @return  \App\User
     */
    protected function create(array $data)
    {
        $quality = 90;
        $storagePath = '/app/public/';
        if (request()->hasFile('u_i_input')) {
            $image = request()->file('u_i_input');
            $fileName = time() . "_" . $image->getClientOriginalName();
            $resizeImage = InterventionImage::make($image)
                ->resize(350, 350, function($constraint){
                    $constraint->aspectRatio();
            });

            // 20KB未満まで圧縮する。
            // if($resizeImage->filesize() > 20000){
            //     do{
            //         if($quality < 15){
            //             // dd($quality);
            //             break;
            //         }
            //         $quality = $quality - 5;
            //         $resizeImage->save(storage_path($storagePath . $fileName), $quality);
            //     }while($resizeImage->filesize() > 20000);
            // }
            $resizeImage->save(storage_path($storagePath . $fileName), $quality);
            $image_path = basename($fileName); //画像名のみ保存
        } else {
            $image_path = null; //nullを入れないと空になる
        }

        $user = User::create([
            'image' => $image_path,
            'user_id' => $data['user_id'],
            'password' => Hash::make($data['password']),
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'secret_question_id' => $data['secret_question_id'],
            'secret_answer' => $data['secret_answer'],
        ]);

        return $user;
    }

    // public function getRegister()
    // {
    //     return view("auth.register");
    // }

    // public function postRegister(Request $data)
    // {
    //     User::create([
    //         'user_id' => $data['user_id'],
    //         'password' => Hash::make($data['password']),
    //         'user_name' => $data['user_name'],
    //         'email' => $data['email'],
    //         'secret_question_id' => $data['secret_question_id'],
    //         'secret_answer' => $data['secret_answer'],
    //     ]);

    //     return redirect("/home");
    // }
}
