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
        //オーナー
        \App\User::create([
            'name' => 'さんま',
            'email' => 'rui@rui.rui',
            'password' => bcrypt('0000'),
            'role' => 'owner'
        ]);
    }
}
