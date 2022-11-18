<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\BlogPost;
use Livewire\Component;

class LatestArticles extends Component
{
    public $articles=[];
    public function mount()
    {
        $this->articles = BlogPost::where('status','Y')->limit(6)->get();
    }
    public function render()
    {
        return view('livewire.frontend.includes.partials.latest-articles');
    }
}
