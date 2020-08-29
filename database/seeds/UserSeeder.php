<?php

use App\User;
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
        User::create([
            'name'=>'Ysmine Miranda',
            'email' => 'ysminemiranda@gmail.com',
            'password'=>Hash::make('12345678'), 
        ]);

        User::create([
            'name'=>'Carlos Miranda',
            'email' => 'carlosmiranda@gmail.com',
            'password'=>Hash::make('12345678'), 
        ]);

        User::create([
            'name'=>'Bruno Miranda',
            'email' => 'brunosmiranda@gmail.com',
            'password'=>Hash::make('12345678'), 
        ]);
    }
}
