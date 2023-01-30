<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Checkout extends Component
{
    public $course;
    public $terms = false;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function termsClicked()
    {
        $this->terms = !$this->terms;
    }

    public function render()
    {
        $gst_price = ($this->course->price) * 1.18;

        $gst_price_only = $gst_price - $this->course->price;

        return view('livewire.checkout', compact('gst_price', 'gst_price_only'))->layout('layouts.base');
    }
}
