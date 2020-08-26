<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street_name',
        'complement',
        'street_number',
        'neighborhood',
        'city',
        'state'
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
