<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * Retorna o produto da compra.
     * 
     * @return  \App\Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Retorna o cliente responsável pela compra.
     * 
     * @return  \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['id','amount','quantity','status','installments','product_id','user_id','created_at','updated_at'];

}
