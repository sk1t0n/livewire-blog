<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;

use function Pest\Laravel\assertDatabaseCount;
use function PHPUnit\Framework\assertSame;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('getPosts', function () {
    $tag1 = Tag::factory()->create(['name' => 'tag1']);
    $tag2 = Tag::factory()->create(['name' => 'tag2']);
    assertDatabaseCount('tags', 2);

    $post1 = Post::factory()->create([
        'title' => 'Post1',
        'content' => 'TEST',
        'category_id' => Category::factory(),
    ]);
    $post1->tags()->saveMany([$tag1, $tag2]);
    $post2 = Post::factory()->create([
        'title' => 'Post2',
        'content' => 'TEST',
        'category_id' => Category::factory(),
    ]);
    assertDatabaseCount('posts', 2);

    $postService = new PostService();
    $result = $postService->getPosts($tag1->name, 6);
    assertSame(1, $result->total());
    $result = $postService->getPosts('invalid', 6);
    assertSame(0, $result->total());
    $result = $postService->getPosts('', 6);
    assertSame(2, $result->total());
});
