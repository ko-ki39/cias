
{{ $article->title }}に{{ $name }}さんからコメントが来ました。
<br>コメント内容<br>
{{ $detail }}<br>
<a href="{{ route('article_detail', ['id' => $article->id]) }}">確認する</a>
