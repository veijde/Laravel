<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Article::factory(6)->Create();

        // Article::create([
        //     'title' => 'Artikel 1',
        //     'tags' => 'test, dummy',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus urna ut commodo varius. Pellentesque in lacinia nisl, a commodo erat. Suspendisse vestibulum fermentum tristique. Mauris ut sollicitudin ligula, quis malesuada tellus. Quisque consectetur lectus felis, auctor vulputate velit consequat eget. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut convallis pellentesque tellus. Maecenas in risus malesuada, tempus lacus et, molestie purus. Nunc et nisi quis mauris imperdiet congue vel sed nibh. Morbi libero libero, aliquet ut luctus sed, condimentum eu lorem. Aliquam varius eleifend nulla, non fringilla tellus condimentum nec. Cras viverra semper leo, eget cursus lacus. Cras hendrerit elit vitae pellentesque pellentesque. Vestibulum id consequat felis. Nullam laoreet condimentum justo in imperdiet. Donec augue odio, finibus eu ornare eu, egestas non purus. '
        // ]);

        // Article::create([
        //     'title' => 'Artikel 2',
        //     'tags' => 'damn, lol',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus urna ut commodo varius. Pellentesque in lacinia nisl, a commodo erat. Suspendisse vestibulum fermentum tristique. Mauris ut sollicitudin ligula, quis malesuada tellus. Quisque consectetur lectus felis, auctor vulputate velit consequat eget. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut convallis pellentesque tellus. Maecenas in risus malesuada, tempus lacus et, molestie purus. Nunc et nisi quis mauris imperdiet congue vel sed nibh. Morbi libero libero, aliquet ut luctus sed, condimentum eu lorem. Aliquam varius eleifend nulla, non fringilla tellus condimentum nec. Cras viverra semper leo, eget cursus lacus. Cras hendrerit elit vitae pellentesque pellentesque. Vestibulum id consequat felis. Nullam laoreet condimentum justo in imperdiet. Donec augue odio, finibus eu ornare eu, egestas non purus. '
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
