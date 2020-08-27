<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'street_name', 'street_number', 'complement', 'neighborhood', 'city', 'state', 'user_id',
    ];

    /**
     * Retorna o usuário dono deste documento
     * 
     * @return  \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
