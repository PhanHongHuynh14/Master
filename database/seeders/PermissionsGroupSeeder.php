<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionsGroup;

class PermissionsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionsGroup::factory()->count(50)->create();
    }
}
