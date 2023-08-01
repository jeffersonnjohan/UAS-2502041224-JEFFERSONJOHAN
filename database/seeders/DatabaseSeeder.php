<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Avatar;
use App\Models\Hobby;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Hobby::create([
            'name' => 'Cook',
        ]);
        Hobby::create([
            'name' => 'Basket',
        ]);
        Hobby::create([
            'name' => 'Dance',
        ]);
        Hobby::create([
            'name' => 'Sing',
        ]);

        Avatar::create([
            'name' => 'Layla',
            'image' => 'avatar/stiker1.png'
        ]);

        Avatar::create([
            'name' => 'Tesla',
            'image' => 'avatar/stiker2.png'
        ]);

        Avatar::create([
            'name' => 'Hyundai',
            'image' => 'avatar/sticker3.png'
        ]);

        Avatar::create([
            'name' => 'Motorola',
            'image' => 'avatar/stiker4.png'
        ]);
    }
}
