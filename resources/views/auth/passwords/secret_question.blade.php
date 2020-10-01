@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('秘密の質問') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('secret_question_answer') }}">
                        @csrf

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
                                    {{ __('確定') }}
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
