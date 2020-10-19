<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Library\HamburgerNotice;

class Hamburger extends Component
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
        $hamburgerNotice = HamburgerNotice::callDB();
        // dd($hamburgerNotice);
        return view('components.hamburger', compact('hamburgerNotice'));
    }
}
