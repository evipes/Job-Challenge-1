<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Metodo para criação de um novo usuario no banco de dados
     * 
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public static function createUser(Request $request)
    {
        DB::beginTransaction();
            $user = self::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
                ]);
                
            $user->address()->create([
                'street_name'=>$request->street_name,
                'complement'=>$request->complement,
                'street_number'=>(int)$request->street_number,
                'neighborhood'=>$request->neighborhood,
                'city'=>$request->city,
                'state'=>$request->state
            ]);

            $user->documents()->create([

                'type'=>$request->type,
                'number'=>(int)$request->number,
            ]);

            $user->save();
            $nameUser = $user->name;
        DB::commit();   

        $request->session()->flash('mensagem',"Obrigado {$user}, seu cadastro foi concluido com sucesso.");
        return $user;
    }
}