@extends('layouts.app')
@section('title', 'アカウント生成ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
@endsection
@section('content')
    {{-- アカウント生成用のページ --}}
    <table>
        <th>学科</th>
        <th>学年</th>
        <th>人数</th>
        <th>期限</th>
        <tr>
            <form action="{{ route('generate') }}" onsubmit="return user_create()">
                <td><select name="department">
                        <option value="1">オフィスビジネス科（前期）</option>
                        <option value="2">オフィスビジネス科（後期）</option>
                        <option value="3">自動車整備科</option>
                        <option value="4">電気システム科</option>
                        <option value="5">メディア・アート科</option>
                        <option value="6">情報システム科</option>
                        <option value="7">造園ガーデニング科</option>
                        <option value="8">総合実務科（知的障がい者対象）</option>
                    </select>
                </td>
                <td><select name="age">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td><input type="number" name="num" id="num" required></td>
                <td><input type="date" name="date" required>
                <input type="submit" value="作成">
            </td>
            </form>
        </tr>

    </table>

@endsection
