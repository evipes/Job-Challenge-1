<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Cliente anonimo',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
