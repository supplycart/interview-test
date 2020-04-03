<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'name', 'price', 'stock','description',
  ];

  public function displayPrice()
  {
    return money_format('RM%i', $this->price);
  }
}
