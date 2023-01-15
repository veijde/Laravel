<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Faqitem;
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
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'admin' => true,
            'password' => bcrypt('Password!321'),
            'birthday' => now()
        ]);

        Article::factory(6)->Create([
            'user_id' => $user->id
        ]);

        $categories = Category::factory(4)->Create();

        foreach($categories as $category) {
            Faqitem::factory(5)->Create([
                'category_id' => $category->id
            ]);
        }

    }
}
