<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create normal user
        // create admin account
        $Admin = User::create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        $profile = Profile::create([
            'user_id' => $Admin->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'furi_first_name' => 'ジョン',
            'furi_last_name' => 'ドウ',
            'nick_name' => 'Admin-John',
        ]);
    }
}
