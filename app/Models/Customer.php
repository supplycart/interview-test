<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="customer";
    protected $primaryKey = "id";

    protected $fillable = [
        "fname",
        "lname",
        "email",
        "password",
        "created_at"
    ];

    public function cartItems(){
        return $this->hasMany("App\Models\CartItem", "cust_id");
    }

}
