<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Library\CommonClass;

class SideBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('コンストラクト');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $articles_ranking = CommonClass::getArticlesRanking();
        // dd($articles_ranking);
        return view('components.side-bar', compact('articles_ranking'));
    }
}
