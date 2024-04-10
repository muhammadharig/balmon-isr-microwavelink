<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Hari Gunawansyah',
            'username' => 'hari',
            'email' => 'hari@gmail.com',
            'password' => Hash::make('hari8061'),
            'photo' => 'https://ui-avatars.com/api/?name=Hari+Pratama&background=random',
            'role' => 'operator',
        ]);
    }
}
