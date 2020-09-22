<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Order extends Model
{
    const STATUS_NEW          = 10;
    const STATUS_PLACED_ORDER = 20;
    const STATUS_CLOSED       = 30;
    const STATUS_CANCELLED    = 40;

    protected $table = 'order';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'cart_id',
        'user_id',
        'status_id',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
