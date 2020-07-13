<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $table = "cartdetails";
    protected $fillable = ['id','cart_id','product_id','productname','productdesc','quantity','totalprice'];
}
