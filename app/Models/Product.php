<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $primaryKey = "id";

    protected $fillable = [
        "name",
        "description",
        "qty_in_stock",
        "price_per_unit"
    ];

    public function cartItems(){
        return $this->hasMany("App\Models\CartItem", "prod_id");
    }

    public function orders(){
        return $this->belongsToMany("App\Models\Order", "line_quantity", "prod_id", "order_id");
    }
}
