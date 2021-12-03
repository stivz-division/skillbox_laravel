<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        Tag::factory(20)->create();

        \App\Models\User::factory(2)->create()->each(function ($user) {
            Article::factory(20)->create([
                'owner_id' => $user->id
            ])->each(function ($article) {
                $article->tags()->attach(Tag::query()->inRandomOrder()->limit(3)->get());
            });

            News::factory(15)->create([
                'author_id' => $user->id
            ]);
        });
    }
}
