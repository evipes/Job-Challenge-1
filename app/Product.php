<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Retorna o usuário que é dono deste produto.
     * 
     * @return  \Illuminate\Collection
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['slug','name','amount','user_id','created_at','updated_at'];

}
