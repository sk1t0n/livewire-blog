<?php

namespace App\Livewire;

use App\Models\Post;
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

    public function render(): View
    {
        $posts = Post::with('tags');

        if ($this->tag) {
            $posts->whereHas('tags', function ($q) {
                $q->where('name', $this->tag);
            });
        }

        $posts = $posts->paginate(self::POSTS_PER_PAGE);

        return view('livewire.post-list', [
            'posts' => $posts,
        ])->title(config('app.name'));
    }
}
