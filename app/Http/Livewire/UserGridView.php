<?php

namespace App\Http\Livewire;

use App\Models\User;
use LaravelViews\Views\GridView;

class UserGridView extends GridView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    public $maxCols = 4;
    public $withBackground = true;

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($model)
    {
        return [
            'image' => $model->profile_photo_path,
            'title' => $model->first_name,
            'subtitle' => $model->last_name,
            //'description' => ''
        ];
    }
}
