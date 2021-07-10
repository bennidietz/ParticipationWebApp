<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Polygon extends Component
{
    public $modalFormVisible = false;
    public $slug;
    public $title;
    public $content;

    /**
     * Shows the form modal
     * of the create function
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    /**
     * the Livewire render function
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.polygon');
    }
}
