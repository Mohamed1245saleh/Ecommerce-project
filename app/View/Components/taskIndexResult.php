<?php

namespace App\View\Components;

use Illuminate\View\Component;

class taskIndexResult extends Component
{
    public $tasks;
    public $paginate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tasks , $paginate)
    {
         $this->tasks    = $tasks;
         $this->paginate = $paginate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.task-index-result');
    }
}
