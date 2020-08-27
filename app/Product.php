<?php

namespace App;

use App\Services\Sanitize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'amount','slug'
    ];

    /**
     * Retorna o usuário que é dono deste produto.
     * 
     * @return  \Illuminate\Collection
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This function insert a product on DB
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public static function createProduct(Request $request)
    {
        DB::beginTransaction();
        $id = Auth::user()->id;
        $user = User::find($id);
        $slug = self::slugCreate($user->name,$request->name);
        $product = $user->products()->create([
            'name'=> $request->name,
            'amount'=>$request->amount,
            'slug'=>$slug
        ]);

        $user->save();
        DB::commit();
        $request->session()->flash('mensagem',"Produto {$request->name} criado com sucesso");
    }


    /**
     * This function create a slug string to products
     * 
     * @param   string  $user_name
     * @param   string  $product_name
     * @return  string  $sluged  
     */
    private static function slugCreate($user_name, $product_name){
        $repeated =0;
        $slug = Sanitize::fullClean($user_name);
        $slug.='-'.Sanitize::fullClean($product_name);
        $isExist=true;
        do {
            $sluged = $slug.$repeated;
            $isExist = Product::select("*")
            ->where("slug", $sluged)
            ->exists();
            $repeated++;
        }while($isExist);
        return $sluged;

    }
}
