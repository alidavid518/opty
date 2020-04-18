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
      'avatar' => 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
    ]);
    // create normal user
    $user = User::create([
      'name' => 'Uri Solomin ',
      'email' => 'solomin@gmail.com',
      'password' => bcrypt('12345678'),
      'role' => 'user',
      'remember_token' => Str::random(10),
    ]);
    $profile = Profile::create([
      'user_id' => $user->id,
      'first_name' => 'Uri',
      'last_name' => 'Solomin',
      'furi_first_name' => 'ジョン',
      'furi_last_name' => 'ドウ',
      'nick_name' => 'User-Solomin',
      'avatar' => 'https://cdn.vuetifyjs.com/images/john.jpg',
    ]);
  }
}
