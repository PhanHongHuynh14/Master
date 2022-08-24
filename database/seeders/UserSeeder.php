<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
        ->state([
            'name' => 'root',
            'email' => 'root@gmail.com',
            'username' => 'root',
            'password' => Hash::make('123'),
            'type' => User::TYPES['admin'],
            'verified_at' => now(),
        ])
        ->create();

        User::factory()
        ->count(20)
        ->state(new Sequence(
            fn () =>[
                'school_id'=> School::all()->random()
            ],
        ))
        ->create();
    }
}
