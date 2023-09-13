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
        $query = Post::with('tags');

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }

        return $query->paginate($postsPerPage);
    }
}
