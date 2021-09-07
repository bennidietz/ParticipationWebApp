<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextCardView extends Component
{
    public $imageUrl;
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageUrl, $text)
    {
        $this->imageUrl = $imageUrl;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-card-view');
    }
}
