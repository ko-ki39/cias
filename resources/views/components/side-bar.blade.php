<div class="side_bar">
    <h2>人気の記事</h2>
    @foreach($articles_ranking as $article_ranking)
    <div class="latest_article">
        <img src="/storage/{{ $article_ranking->image }}" class="side_image">
        <a href="{{ route('article_detail', ['id' => $article_ranking->id]) }}">
            <p>{{ $article_ranking->title }}</p>
        </a>
        <p class="detail">{{ $article_ranking->description }}</p>
        <a href="{{ route('individual', ['id' => \App\User::find($article_ranking->user_id)->id]) }}">
            <p class="user_name">
                {{ \App\User::find($article_ranking->user_id)->user_name }}
            </p>
        </a>
        <p class="date">投稿日付 {{ $article_ranking->created_at }}</p>
    </div>

    @endforeach
</div>
