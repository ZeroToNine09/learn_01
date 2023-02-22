<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::updateOrCreate(['id' => 1], ['name' => \App\Models\Role::ROLE_ADMIN]);
        Role::updateOrCreate(['id' => 2], ['name' => \App\Models\Role::ROLE_STAFF]);
        Role::updateOrCreate(['id' => 3], ['name' => \App\Models\Role::ROLE_GUEST]);
    }
}
