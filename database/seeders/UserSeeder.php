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
        $users = new User();
        $users->name='Tien';
        $users->email='tien@gmail.com';
        $users->password=Hash::make('123');
        $users->address='Hanoi';
        $users->save();

        $users = new User();
        $users->name='Tung';
        $users->email='tung@gmail.com';
        $users->password=Hash::make('145');
        $users->address='HaiDuong';
        $users->save();
    }
}
