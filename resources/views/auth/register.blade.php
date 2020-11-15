@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新ッ規ッ登ッ録ッ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" multiple>
                        @csrf

                        <div class="form-group u_i_parent">
                            <p>ユーザー画像を入れ給えッッッ</p>
                            <div class="u_i_display_area">
                                <input type="file" name="u_i_input" class="u_i_input">
                                <img alt="" class="u_i_img">
                                {{-- <canvas id="u_i_canvas" width="250" height="250"></canvas> --}}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>
                            
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                
                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail(任意)') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('ログインID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード(確認)') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="secret_question_id" class="col-md-4 col-form-label text-md-right">{{ __('秘密の質問') }}</label>
                            
                            <div class="col-md-6">
                                <select required id="secret_question_id" type="text" class="form-control @error('secret_question_id') is-invalid @enderror" name="secret_question_id" required autocomplete="secret_question_id" autofocus>
                                    <option value="1">初めて買ったペットの名前は？</option>
                                    <option value="2">好きな絵本の題名は？</option>
                                    <option value="3">行ってみたい惑星は？</option>
                                    <option value="4">子供の頃のニックネームは？</option>
                                    <option value="5">初めて所有した車の名前は？</option>
                                    <option value="6">初めて映画館で見た映画は？</option>
                                </select>

                                @error('secret_question_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secret_answer" class="col-md-4 col-form-label text-md-right">{{ __('秘密の質問の回答') }}</label>

                            <div class="col-md-6">
                                <input id="secret_answer" type="text" class="form-control @error('secret_answer') is-invalid @enderror" name="secret_answer" value="{{ old('secret_answer') }}" required autocomplete="secret_answer" autofocus>

                                @error('secret_answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
