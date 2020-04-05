<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  protected $table = 'order_items';

  protected $fillable = [
  'order_id', 'product_id', 'quantity', 'price'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function order()
  {
    return $this->belongsTo(Order::class, 'user_id');
  }
}
