<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "Admin";
        $user->password = Hash::make("password");
        $user->phone = "0123456789";
        $user->email = "Admin@gmail.com";

        $user->avatarImage = "";
        $user->fullName = "Administrator";
        $user->address = "Admin address";

        $user->save();
    }
}
