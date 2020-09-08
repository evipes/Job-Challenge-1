<?php

use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{

    public function run()
    {
        DB::table('vendors')->insert([
            'name' => 'Vendedor anonimo',
            'email' => 'vendedor@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
