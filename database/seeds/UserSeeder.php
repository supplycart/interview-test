<?php

use App\User;
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
      /*factory(App\User::class, 3)->create()->each(function ($user) {

      });*/

      User::create([
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => 'testpassword'
        ]);
    }
}
