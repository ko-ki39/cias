@if (null != $articles)
    @foreach ($articles as $article)
        <div class="article_list">
            <input type="hidden" name="a_l_ID" value="{{ $article->id }}">
            <div class="a_l_detail">
                <img src="/storage/{{ $article->image }}" class="image">
                <div class="a_l_d_title">
                    <p>{{ $article->title }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
