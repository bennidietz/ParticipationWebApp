<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoPanel extends Component
{
    public $title;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-panel');
    }
}
