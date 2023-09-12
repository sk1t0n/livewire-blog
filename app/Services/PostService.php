<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class PostService
{
    public function __construct(private Builder $query)
    {
    }

    public function getPosts(
        string $tag,
        int $postsPerPage
    ): LengthAwarePaginator {
        if ($tag) {
            $this->query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }

        return $this->query->paginate($postsPerPage);
    }
}
