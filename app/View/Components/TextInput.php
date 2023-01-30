<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $name;
    public $title;
    public $required;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $required = false, $value)
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
