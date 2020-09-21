<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Cart;
use App\Product;

class CartProduct extends Model
{
    use SoftDeletes;

    protected $table = 'cart_product';

    protected $primaryKey = 'cart_product_id';

    protected $fillable = [
        'cart_id',
        'product_id',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
