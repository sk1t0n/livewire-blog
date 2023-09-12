<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TagSeeder::class);

        $this->createTagsForPosts();
    }

    private function createTagsForPosts(): void
    {
        foreach (Post::get() as $post) {
            $tags = [];
            for ($i = 0; $i < random_int(0, 4); ++$i) {
                $tag = Tag::find(random_int(1, 10));
                if (! in_array($tag, $tags)) {
                    $tags[] = $tag;
                }
            }

            $post->tags()->saveMany($tags);
        }
    }
}
