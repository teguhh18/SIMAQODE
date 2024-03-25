<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);
        $user2 = User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@test.com',
        ]);

        $role = Role::create(['name' => 'Admin']);
        $user1->assignRole($role);

        $role = Role::create(['name' => 'Staff']);
        $user2->assignRole($role);


        
    }
}
