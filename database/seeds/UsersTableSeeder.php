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
        $user = App\User::create([
            'name' => 'RLG',
            'email' => 'rlg@test.com',
            'password' => bcrypt('testtest'),
            'admin' => 1
        ]);

    
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'storage/avatar/1.png',
            'about' => 'Hi there, this is a fight!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
