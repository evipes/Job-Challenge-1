<?php

use App\Sale;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'amount' => 14.00,
            'quantity'=>'1',
            'status'=>'approved',
            'installments'=>'2',
            'product_id'=>'1',
            'user_id'=>2
        ]);

        Sale::create([
            'amount' => 214.00,
            'quantity'=>'1',
            'status'=>'approved',
            'installments'=>'4',
            'product_id'=>'2',
            'user_id'=>2
        ]);
    }
}
