<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'sudo',
            'email' => 'sudo@admin.com',
            'password' => bcrypt('012345678'),
            'type' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@user.com',
            'password' => bcrypt('12345678'),
            'type' => 'user',
        ]);

        
    }
}
