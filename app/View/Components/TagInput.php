<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagInput extends Component
{
    public $name;
    public $title;
    public $required;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $required = false, $selected = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tag-input');
    }
}
