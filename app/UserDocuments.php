<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocuments extends Model
{
    /**
     * Retorna o usuário dono deste documento
     * 
     * @return  \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['id','type','number','user_id','created_at','updated_at'];

}
