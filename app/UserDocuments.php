<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocuments extends Model
{
    protected $fillable = [
        'type', 'number', 'complement', 'user_id',
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
