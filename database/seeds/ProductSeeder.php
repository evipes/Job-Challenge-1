<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'slug'=>'1234',
            'name'=>'arroriz',
            'amount' => 12.00,
            'user_id'=>1 
        ]);

        Product::create([
            'slug'=>'5432',
            'name'=>'melit',
            'amount' => 14.00,
            'user_id'=>3
        ]);
    }
}
