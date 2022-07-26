<?php

namespace Database\Seeders;

use App\Models\Role;
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

        $this->call([
            PermissionsGroupSeeder::class,
            PermissionsSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            TagSeeder::class,
            TaggablesSeeder::class,
            AttachmentSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
