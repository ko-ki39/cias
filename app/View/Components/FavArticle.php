<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Fav;
use Illuminate\Support\Facades\Auth;
use App\Article;

class FavArticle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $favs = Fav::where('user_id', Auth::id())->get();
        $comment = 'null';

        foreach($favs as $key => $fav){
            $articles[$key] = Article::find($fav->article_id);
        }

        if(empty($articles)){
            // なかった場合の表示
            $articles = null;
        }

        return view('components.fav-article', compact('articles', 'comment'));
    }
}
