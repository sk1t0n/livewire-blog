<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function render(): View
    {
        return view('livewire.post-detail')
            ->title(config('app.name').' | '.$this->post->title);
    }
}
