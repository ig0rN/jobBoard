<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Igor Nikolic',
            'email' => 'igor@test.com',
            'password' => bcrypt('testtest'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'HR1',
            'email' => 'HRtest1@test.com',
            'password' => bcrypt('HRtest1'),
            'role_id' => 2     
        ]);

        User::create([
            'name' => 'HR2',
            'email' => 'HRtest2@test.com',
            'password' => bcrypt('HRtest2'),
            'role_id' => 2
        ]);
        
        User::create([
            'name' => 'Moderator',
            'email' => 'mdoerator@test.com',
            'password' => bcrypt('moderator'),
            'role_id' => 1
        ]);
    }
}
