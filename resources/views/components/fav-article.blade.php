@foreach ($articles as $article)
    <div class="comment_article">
        <p class="date"> @if (Illuminate\Support\Facades\DB::table("favs")
            ->where("article_id", "=", $article->id)
            ->where("user_id", "=", Auth::id())->exists() != null)
    <div class="fav">
        <i id="" class="heart-button-l fa-heart fa-2x tippyLoginFav fas" style="color:#ff0000;"></i>
    </div>
    @else
        <div class="fav">
            <i id="" class="heart-button-l fa-heart fa-2x tippyGuestFav far" style="color:#ff0000;"></i>
        </div>
    @endif{{ $article->created_at }}</p>
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
