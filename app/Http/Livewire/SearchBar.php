<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public $searchResults = [];


    public function render()
    {
        $this->searchResults = Course::where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.search-bar');
    }
}
