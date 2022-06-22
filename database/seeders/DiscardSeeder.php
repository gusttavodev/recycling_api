<?php

namespace Database\Seeders;

use App\Models\Discard;
use App\Models\User;
use Illuminate\Database\Seeder;

class DiscardSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            $user->discard()->saveMany(
                Discard::factory(5)->create([
                    'user_id'    => $user->id,
                    'product_id' => $user->products()->get()->random()->id
                ])
            );
        });
    }
}
