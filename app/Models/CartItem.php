<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table="cart_item";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "prod_id"
    ];

    public function customer(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function product(){
        return $this->belongsTo("App\Models\Product", "prod_id");
    }

}
