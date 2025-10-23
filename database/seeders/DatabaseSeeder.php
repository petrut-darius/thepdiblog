<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::factory()->admin()->create();
        Role::factory()->user()->create();

        $user = User::factory()->create([
            "first_name" => "Petrut",
            "last_name" => "Darius-Ioan",
            "email" => "eminoviciidarius@gmail.com",
            "role_id" => 1,
            "password" => bcrypt("30ianpdi")
        ]);
        
        $user->posts()->save(Post::factory()->make());
    }
}
