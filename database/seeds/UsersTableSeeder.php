<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
          [
            [
              'name' => 'Tyler Rehm',
              'email' => 'tyler@hackrforce.com',
              'password' => bcrypt('Tbr247936'),
              'remember_token' => str_random(10),
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ]
          ]
        );

        factory(App\User::class, 10)->create()->each(function($u) {

        });
    }
}
