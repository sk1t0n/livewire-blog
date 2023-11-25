<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService
{
    public function getPosts(
        string $tag,
        int $postsPerPage
    ): LengthAwarePaginator {
        return Post::withTag($tag)->paginate($postsPerPage);
    }

    public function getPostById(int $id): Post
    {
        return Post::select([
            'id',
            'title',
            'content',
            'image',
            'category_id',
            'created_at',
        ])->findOrFail($id);
    }
}
