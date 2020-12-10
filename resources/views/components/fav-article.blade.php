@if (null != $articles)
    @foreach ($articles as $article)
        <a href="{{ route('article_detail', ['id' => $article->id]) }}" class="article_list">
            <input type="hidden" name="a_l_ID" value="{{ $article->id }}">
            <div class="a_l_detail">
                <img src="/storage/{{ $article->image }}" class="image">
                <div class="a_l_d_title">
                    <p>{{ $article->title }}</p>
                </div>
            </div>
        </a>
    @endforeach
@endif
