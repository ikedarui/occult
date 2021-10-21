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
            'name' => '池田琉生',
            'email' => 'ruisandes@i.softbank.jp',
            'password' => bcrypt('0000'),
            'role' => 'owner'
        ]);
    }
}
