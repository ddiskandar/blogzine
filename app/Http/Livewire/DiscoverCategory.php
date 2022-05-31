<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class DiscoverCategory extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::query()
            ->withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.discover-category');
    }
}
