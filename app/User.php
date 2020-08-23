<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Retorna o endereço do usuário.
     *
     * @return  \App\UserAddress
     */
    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    /**
     * Retorna uma lista com todos os documentos do usuário.
     *
     * @return  \Illuminate\Database\Eloquent\Collection
     */
    public function documents()
    {
        return $this->hasMany(UserDocuments::class);
    }

    /**
     * Retorna uma lista com todos os produtos do usuário
     *
     * @return  \Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Retorna uma lista com todas as compras que ele usuário realizou.
     *
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'role' => $this->role
        ];
    }
}
