<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Warrior;
use Database\Factories\WarriorFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create()->each(function ($user) {
            Warrior::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
