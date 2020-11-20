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
                                    <input type="hidden" name="current_image" value="{{ $user->image }}">
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
