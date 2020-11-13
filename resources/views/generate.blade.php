@extends('layouts.app')

@section('content')
    {{-- アカウント生成用のページ --}}
    <th>学科</th>
    <th>年</th>
    <th>人数</th>
    <th>期限</th>
    <tr>
        <form action="{{ route('generate') }}">
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
            <td><input type="number" name="num" id="num"></td>
                <input type="submit" value="作成">
        </form>
    </tr>
@endsection
