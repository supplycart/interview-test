<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'name', 'price', 'image', 'stock','description',
  ];

  public function items()
  {
      return $this->hasMany(OrderItem::class);
  }

}
