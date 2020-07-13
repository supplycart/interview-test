<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "placeorder";
    protected $fillable = ['id','cart_id','cartdetails_id','product_id','image','productname','productdesc','quantity','totalprice'];
}
