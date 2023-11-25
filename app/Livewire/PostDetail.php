<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\View\View;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount(PostService $service, int $id): void
    {
        $this->post = $service->getPostById($id);
    }

    public function render(): View
    {
        return view('livewire.post-detail')
            ->title(config('app.name').' | '.$this->post->title);
    }
}
