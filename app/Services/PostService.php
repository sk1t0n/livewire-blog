<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function getPosts(
        string $tag,
        int $postsPerPage
    ): LengthAwarePaginator {
        $query = $this->postRepository->findAllPostsByTagName($tag);

        return $query->paginate($postsPerPage);
    }
}
