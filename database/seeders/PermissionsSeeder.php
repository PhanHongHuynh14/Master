<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\PermissionsGroup;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory()
        ->count(10)
        ->state(new Sequence(
            fn () => [
                'permission_group_id' => PermissionsGroup::all()->random(),
            ],
        ))
        ->create();
    }
}
