<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            $user->categories()->saveMany(
                Category::factory(5)->make()
            )->each(function ($category) {
                $category->products()->saveMany(
                    Product::factory(10)->make(['user_id' => $category->user_id])
                );
            });
        });
    }
}
