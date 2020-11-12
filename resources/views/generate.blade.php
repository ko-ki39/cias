@extends('layouts.app')

@section('content')
    {{-- アカウント生成用のページ --}}
    <form action="{{ route('generate') }}">
        <th>学科</th>
        <th>人数</th>
        <th>年</th>
        <td><select name="department">
                <option value="1">管理者権限 1</option>
                <option value="2" selected>投稿許可権限 2</option>
                <option value="1">管理者権限 1</option>
                <option value="2" selected>投稿許可権限 2</option>
                <option value="1">管理者権限 1</option>
                <option value="2" selected>投稿許可権限 2</option>
                <option value="1">管理者権限 1</option>
                <option value="2" selected>投稿許可権限 2</option>
            </select>
        </td>
        <td><input type="number" name="num" id="num"></td>
        <td><select name="age">
            <option value="1">
                </option>
        </select></td>
    </form>
@endsection
