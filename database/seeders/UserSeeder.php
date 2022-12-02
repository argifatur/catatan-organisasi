<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminUser = User::create([
              'name' => 'Superadmin',
              'email' => 'superadmin@admin.com',
              'password' => bcrypt('secret'),
          ]);
    }
}
