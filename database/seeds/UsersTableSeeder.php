<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@qoruz.com';
        $user->phone = '1234567890';
        $user->password = Hash::make('admin123');
        $user->type = 'admin';
        $user->save();
    }
}
