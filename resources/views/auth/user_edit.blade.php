@extends('layouts.app')
@section('title', 'ユーザー情報変更ページ')
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
                                <p>アイコンに使う画像を入れてください</p>
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
                                    placeholder="20文字以内（※必須）"
                                    maxlength="20"
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
                                <label for="occupation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('希望職種') }}</label>

                                <div class="col-md-6">
                                    <input id="occupation" type="text" value="{{ $user->occupation }}"
                                    placeholder="30文字以内"
                                    maxlength="30"
                                        class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                        value="{{ old('occupation') }}" autocomplete="occupation" autofocus>

                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('希望地') }}</label>

                                <div class="col-md-6">
                                    <input id="area" type="text" value="{{ $user->area }}"
                                    placeholder="30文字以内"
                                    maxlength="30"
                                        class="form-control @error('area') is-invalid @enderror" name="area"
                                        value="{{ old('area') }}" autocomplete="area" autofocus>

                                    @error('area')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="capacity"
                                    class="col-md-4 col-form-label text-md-right">{{ __('資格、検定など') }}</label>

                                <div class="col-md-6">
                                    <textarea id="capacity"
                                    placeholder="250文字以内"
                                        class="form-control @error('capacity') is-invalid @enderror" name="capacity"
                                        value="{{ old('capacity') }}"
                                        maxlength="250" autocomplete="capacity" autofocus>
                                        {{ $user->capacity }}
                                                </textarea>

                                    @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="introduction"
                                    class="col-md-4 col-form-label text-md-right">{{ __('自己紹介') }}</label>

                                <div class="col-md-6">
                                    <textarea id="introduction"
                                    placeholder="450文字以内"
                                        class="form-control @error('introduction') is-invalid @enderror" name="introduction"
                                        value="{{ old('introduction') }}" autocomplete="introduction"
                                        maxlength="450"
                                        autofocus>
                                        {{ $user->introduction }}
                                                </textarea>

                                    @error('introduction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('現在のパスワード') }}</label>

                        <div class="col-md-6">
                            <input id="now_password" type="password"
                                class="form-control @error('now_password') is-invalid @enderror" name="now_password"
                                required autocomplete="new-password">

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
