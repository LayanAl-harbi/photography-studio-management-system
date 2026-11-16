<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Test Photographer',
                'email' => 'photographer@photostudio.com',
                'role' => 'photographer',
            ],
            [
                'name' => 'Test Client',
                'email' => 'client@photostudio.com',
                'role' => 'client',
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrNew([
                'email' => $data['email'],
            ]);

            $user->name = $data['name'];
            $user->password = 'Test@12345';
            $user->role = $data['role'];
            $user->is_active = true;

            $user->save();
        }
    }
}
