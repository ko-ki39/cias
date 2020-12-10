@if(!empty($articles))
    @foreach ($articles as $article)
        <div class="article_list">
            <input type="hidden" name="a_l_ID" value="{{ $article->id }}">
            <div class="a_l_detail">
                {{-- <p class="date"><i class="far fa-comment fa-2x comment-button-l"
                        style="color:#259b25;"></i>{{ $article->created_at }}</p> --}}
                <img src="/storage/{{ $article->image }}" class="image">
                <div class="a_l_d_title">
                    <p>{{ $article->title }}</p>
                </div>
                {{-- <div class="user">
                    <a href="{{ route('individual', ['id' => \App\User::find($article->user_id)->id]) }}">
                        <div class="user_image"></div>
                        <p class="user_name">{{ \App\User::find($article->user_id)->user_name }}</p>
                    </a>
                </div> --}}
                {{-- <a href="{{ route('article_detail', ['id' => $article->id]) }}">
                    <p class="title">{{ $article->title }}</p>
                </a> --}}
            </div>
        </div>
    @endforeach

@endif
