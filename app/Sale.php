<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'quantity',
        'status',
        'installments',
        'product_id',
        'user_id',
    ];

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

    /**
     * This function perform a sale
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public static function toSale(Request $request)
    {
        
        DB::beginTransaction();
        $slug =$request->product;
        $product = Product::where('slug',$slug)->first();
        $sallesman = $product->user;
        $id = Auth::user()->id;
        $buyer = User::find($id);

        $status = 'approved';
        $sale = Sale::create([
            'amount'=>$product->amount,
            'quantity'=>1,
            'status'=>$status,
            'installments'=>1,
            'product_id'=>$product->id,
            'user_id'=>$id,
        ]);
        $product->sold = $product->sold + 1;
        $product->save();

        $sale->push();
        DB::commit();
    }

}
