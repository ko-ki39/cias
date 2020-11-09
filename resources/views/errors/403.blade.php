@extends('errors::minimal')

@section('title', __('Forbidden'))

<img src="/images/403error.jpg" alt="" height="80%" width="100%">
{{-- @section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
