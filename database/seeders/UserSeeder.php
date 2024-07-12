<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = User::create([
        'user' => 'admin',
        'username' => 'Admin',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        'email' => 'admin@admin.com',
        'state' => '1',
      ]);
      $admin->assignRole('Admin');


      User::factory(20)->create()->each(function ($user) {
        $user->assignRole('User');
});
    }
}
