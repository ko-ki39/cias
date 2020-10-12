@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログイン中です！！！') }}<br>
                    <br>
                    <small>{{ __('ログアウトする場合は、右上のメニューから行ってください')}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
