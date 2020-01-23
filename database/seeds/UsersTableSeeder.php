<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'Daniel Moncada',
            'email' => 'bryandmr@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12121212'), // password
            
            
            'dni' =>'70404083',
            'address' => '',
            'phone' => '',
            'role' => 'admin'
        ]);

        factory(User::class, 50)->create();
    }
}
