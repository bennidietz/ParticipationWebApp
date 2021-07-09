<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Project extends Component
{
    public $image;
    public $title;
    public $description;
    public $people;
    public $link = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $title, $description, $people, $link)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->people = $people;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project');
    }
}
