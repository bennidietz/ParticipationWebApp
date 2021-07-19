<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoImagePanel extends Component
{
    public $title;
    public $text;
    public $image;
    public $url;
    public $btntext;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $text, ?string $btntext = null, $image, ?string $url = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->image = $image;
        $this->url = $url;
        $this->btntext = $btntext;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-image-panel');
    }
}
