@if (null != $articles)
    @foreach ($articles as $article)
        <div class="article_list">
            <p class="date">
                {{ $article->created_at }}
            </p>
            <img src="/storage/{{ $article->image }}" class="image">
            <div class="user">
                <a href="{{ route('individual', ['id' => \App\User::find($article->user_id)->id]) }}">
                    <div class="user_image"></div>
                    <p class="user_name">{{ \App\User::find($article->user_id)->user_name }}</p>
                </a>
            </div>
            <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                <p class="title">{{ $article->title }}</p>
            </a>
        </div>
    @endforeach
@endif
