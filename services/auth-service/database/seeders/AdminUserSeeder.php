<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@photostudio.com',
        ]);

        $admin->name = 'System Admin';
        $admin->password = 'Admin@12345';
        $admin->role = 'admin';
        $admin->is_active = true;

        $admin->save();
    }
}
