<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Post;
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
        //App\Models\User::factory(10)->create();
        Admin::factory()->create();
           //Admin::factory()->has(Post::factory()->count(4))->create();
        
        //    Admin::factory(2)
        //    ->has(Role::factory()->count(4))
        //    ->create();

    }
}
