<div class="side_bar">
    <h2>人気の記事</h2>
    @foreach ($articles_ranking as $article_ranking)
        {{-- <div class="latest_article">
            <div class="image_div">
                <img src="/storage/{{ $article_ranking->image }}" class="side_image"></div>
            <a href="{{ route('article_detail', ['id' => $article_ranking->id]) }}">
                <p>{{ $article_ranking->title }}</p>
            </a>
            <a href="{{ route('individual', ['id' => \App\User::find($article_ranking->user_id)->id]) }}">
                <p class="user_name">
                    {{ \App\User::find($article_ranking->user_id)->user_name }}
                </p>
            </a>
            <p class="date">投稿日付 {{ $article_ranking->created_at }}</p>
        </div> --}}
        <div class="latest_article">
            <div class="l_a_img">
                <img src="/storage/{{ $article_ranking->image }}" alt="">
            </div>
            <div class="l_a_detail">
                <a href="{{ route('article_detail', ['id' => $article_ranking->id]) }}">
                    {{ $article_ranking->title }}
                </a>
                <a href="{{ route('individual', ['id' => \App\User::find($article_ranking->user_id)->id]) }}">
                    投稿者：{{ \App\User::find($article_ranking->user_id)->user_name }}
                </a>
                <p>投稿日時&nbsp;{{ $article_ranking->created_at }}</p>
            </div>
        </div>

    @endforeach
</div>
