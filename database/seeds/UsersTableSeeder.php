<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        $user_1 = User::updateOrCreate(
            [ 'email' => 'admin@interview.com'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $user_1->roles()->sync([1]);

        // Users
        $user_2 = User::updateOrCreate(
            [ 'email' => 'staff@interview.com'],
            [
                'name' => 'Jenny',
                'password' => \Illuminate\Support\Facades\Hash::make('staff'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $user_2->roles()->sync([2]);

        // Users
        $user_3 = User::updateOrCreate(
            [ 'email' => 'guest@interview.com'],
            [
                'name' => 'Sunny',
                'password' => \Illuminate\Support\Facades\Hash::make('guest'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $user_3->roles()->sync([3]);
    }
}
