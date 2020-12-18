<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentArticle extends Component
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
        $comments = Comment::where('user_id', Auth::id())->get();

        foreach ($comments as $key => $comment) {
            $a_comments[$key] = $comment->article_id;
        }
        if(!empty($a_comments)){

            $a_comments = array_unique($a_comments); //重複した記事を削除
            foreach ($a_comments as $key => $a_comment) {
                $articles[$key] = Article::find($a_comment);
            }
        }else{
            $articles = null;
            $comment = 'コメントがありません';
        }

        // if (!empty($articles)) {
        //     // なかった場合の表示
        // }
        // compact $a_comments  $articles $comment
        return view('components.comment-article', compact('articles', 'comment'));
    }
}
