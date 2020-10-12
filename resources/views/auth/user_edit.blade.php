@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ユーザー情報編集') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user_update') }}" enctype="multipart/form-data" multiple>
                            @csrf

                            <div class="form-group u_i_parent">
                                <p>ユーザー画像を入れ給えッッッ</p>
                                <div class="u_i_display_area">
                                    <input type="file" name="u_i_input" class="u_i_input">
                                    <img src="/storage/{{ $user->image }}" class="u_i_img">
                                    <canvas id="u_i_canvas" width="250" height="250"></canvas>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text" value="{{ $user->user_name }}"
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="5user_name" autofocus>

                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail(任意)') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="secret_question_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('秘密の質問') }}</label>

                                <div class="col-md-6">
                                    <select required id="secret_question_id" type="text"
                                        class="form-control @error('secret_question_id') is-invalid @enderror"
                                        name="secret_question_id" required autocomplete="secret_question_id" autofocus>

                                        <option value="1">初めて買ったペットの名前は？</option>
                                        @if ($user->secret_question_id == 2)
                                            <option value="2" selected>好きな絵本の題名は？</option>
                                        @else
                                            <option value="2">好きな絵本の題名は？</option>
                                        @endif
                                        @if ($user->secret_question_id == 3)
                                            <option value="3" selected>行ってみたい惑星は？</option>
                                        @else
                                            <option value="3">行ってみたい惑星は？</option>
                                        @endif
                                        @if ($user->secret_question_id == 4)
                                            <option value="4" selected>子供の頃のニックネームは？</option>
                                        @else
                                            <option value="4">子供の頃のニックネームは？</option>
                                        @endif
                                        @if ($user->secret_question_id == 5)
                                            <option value="5" selected>初めて所有した車の名前は？</option>
                                        @else
                                            <option value="5">初めて所有した車の名前は？</option>
                                        @endif
                                        @if ($user->secret_question_id == 6)

                                            <option value="6" selected>初めて映画館で見た映画は？</option>
                                        @else
                                            <option value="6">初めて映画館で見た映画は？</option>
                                        @endif

                                    </select>

                                    @error('secret_question_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="secret_answer"
                                    class="col-md-4 col-form-label text-md-right">{{ __('秘密の質問の回答') }}</label>

                                <div class="col-md-6">
                                    <input id="secret_answer" value="{{ $user->secret_answer }}" type="text"
                                        class="form-control  @error('secret_answer') is-invalid @enderror"
                                        name="secret_answer" value="{{ old('secret_answer') }}" required
                                        autocomplete="secret_answer" autofocus>

                                    @error('secret_answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('現在のパスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="now_password" type="password" class="form-control @error('now_password') is-invalid @enderror" name="now_password" required autocomplete="new-password">

                                    @error('now_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('変更する') }}
                                    </button>
                                    <a href="{{ route('password_edit') }}">パスワードを変更する</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
