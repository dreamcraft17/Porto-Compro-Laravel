<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password'=>'admin123',
            'is_admin' => true,
        ]);

        Category::create([
            'name' => 'Company Achievement',
            'slug' => 'company-achievement'
        ]);
        Category::create([
            'name' => 'Careers',
            'slug' => 'careers'
        ]);
        Category::create([
            'name' => 'Products',
            'slug' => 'product'
        ]);
        Category::create([
            'name' => 'News',
            'slug' => 'news'
        ]);
    }
}
