
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    @if ($article->comment_count == 0)
        {{-- コメントがない場合 --}}
        <div class="comment"><a href="{{ route('articleDetailForcus', ['id' => $article->id . '#comment_area']) }}"><i
                    class="far fa-comment fa-2x comment-button-l" style="color:#259b25;"></i></a>
        </div>

    @else
        {{-- コメントがある場合 --}}
        <div class="comment">
            <a href="{{ route('articleDetailForcus', ['id' => $article->id . '#comment_area']) }}">
                <i class="fas fa-comment fa-2x comment-button-l" style="color:#259b25;"></i>
            </a>
            <p>{{ $article->comment_count }}</p>{{-- コメントの数
            --}}
        </div>
    @endif

    <div class="twitter">
        <a href="http://twitter.com/share?text={{ $article->title }}&url={{ route('article_detail', ['id' => $article->id]) }}&hashtags={{ $article->hash1_id }}"
            rel="nofollow" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-twitter-square fa-2x twitter-button-l" style="color:#1da1f2;"></i>
        </a>
        <p>&nbsp;</p>
    </div>
    @if (\App\Fav::where('article_id', '=', $article->id)
        ->where('user_id', '=', Auth::id())
        ->exists() != null)
        <div class="fav">
            <i id="" class="heart-button-l fa-heart fa-2x tippyLoginFav fas" style="color:#ff0000;"></i>
            @if ($article->fav_count != 0)
                <p>{{ $article->fav_count }}</p>
            @endif
        </div>
    @else
        <div class="fav">
            <i id="" class="heart-button-l fa-heart fa-2x tippyGuestFav far" style="color:#ff0000;"></i>
            @if ($article->fav_count != 0)
                <p>{{ $article->fav_count }}</p>
            @endif
        </div>
    @endif

