<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('temppassword'),
            'is_admin' => 1,
        ]);
    }
}
