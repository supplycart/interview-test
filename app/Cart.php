<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\CartProduct;

class Cart extends Model
{
    use SoftDeletes;

    const STATUS_NEW          = 10;
    const STATUS_PLACED_ORDER = 20;

    protected $table = 'cart';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'status_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'cart_id');
    }

    public function cartProduct()
    {
        return $this->hasMany(CartProduct::class, 'cart_id', 'cart_id');
    }

    public function ScopeCheckoutCart()
    {
    }
}
