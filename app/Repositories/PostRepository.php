<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository
{
    public function findAllPostsByTagName(string $tag): Builder
    {
        $query = Post::query()->select([
            'id',
            'title',
            'content',
            'image',
            'category_id',
            'created_at',
        ]);

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->select(['name'])->where('name', $tag);
            });
        }

        return $query;
    }

    public function findById(int $id): Post
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
