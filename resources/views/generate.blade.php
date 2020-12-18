@extends('layouts.app')
@section('title', 'アカウント生成ページ')
@section('import')
    {{-- css等の読み込み場所 --}}
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
@endsection
@section('content')
    {{-- アカウント生成用のページ --}}
    {{-- ユーザー生成後の戻るボタン --}}
    <form action="{{ route('admin') }}">
    <input type="submit" value="戻る" id="back" style="display:none">
    </form>
    <table>
        <th class="department_c">学科</th>
        <th class="age">学年</th>
        <th class="num">人数</th>
        <th class="date">有効期限</th>
        <tr>
            <form action="{{ route('generate') }}" onsubmit="return user_create()">
                <td><select name="department" id="department" class="department_c">
                        <option value="1">オフィスビジネス科（前期）</option>
                        <option value="2">オフィスビジネス科（後期）</option>
                        <option value="3">自動車整備科</option>
                        <option value="4">電気システム科</option>
                        <option value="5">メディア・アート科</option>
                        <option value="6">情報システム科</option>
                        <option value="7">造園ガーデニング科</option>
                        <option value="8">総合実務科（知的障がい者対象）</option>
                        <option value="9" id="off">管理者用アカウント</option>
                    </select>
                </td>
                <td><select name="age" class="age">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td><input type="number" name="num" class="num" required></td>
                <td><input type="date" name="date" class="date" required>
                    <input type="submit" id="generate" value="作成">
                </td>
            </form>
        </tr>

    </table>

@endsection

@section('js')
    <script src="/js/admin_generate.js"></script>
@endsection
