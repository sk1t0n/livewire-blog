<?php

namespace App\Livewire;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\View\View;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount(PostRepository $postRepository, int $id): void
    {
        $this->post = $postRepository->findById($id);
    }

    public function render(): View
    {
        return view('livewire.post-detail')
            ->title(config('app.name').' | '.$this->post->title);
    }
}
