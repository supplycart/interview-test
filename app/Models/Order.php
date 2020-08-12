<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "subtotal"
    ];

    public function products(){
        return $this->belongsToMany("App\Models\Product", "line_quantity", "order_id", "prod_id");
    }

}
