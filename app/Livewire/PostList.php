<?php

namespace App\Livewire;

use App\Services\PostService;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    private const POSTS_PER_PAGE = 6;

    /** @var string */
    #[Url]
    public $tag = '';

    public function render(PostService $service): View
    {
        $posts = $service->getPosts($this->tag, self::POSTS_PER_PAGE);

        return view('livewire.post-list', [
            'posts' => $posts,
        ])->title(config('app.name'));
    }
}
