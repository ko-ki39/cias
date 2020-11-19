@extends('errors::minimal')

@section('title', __('Forbidden'))
    @if (Auth::check())
        <p>初期設定を完了させないと使用できません</p>
        <a href="{{ route('user_edit') }}">初期設定へ</a>
    @else
        <img src="/images/403error.jpg" alt="" height="80%" width="100%">
    @endif
    {{-- @section('code', '403')
    @section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
