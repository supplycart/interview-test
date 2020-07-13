<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "products";
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id','productname','stock','productstock','price','image'];
}
