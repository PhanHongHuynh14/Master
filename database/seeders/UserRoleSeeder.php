<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::factory()
        ->count(20)
        ->state(new Sequence(
            fn () =>[
                'user_id'=> User::all()->random(),
                'role_id'=> Role::all()->random(),
            ],
        ))
        ->create();
    }
}
