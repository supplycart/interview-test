<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table="product";
    protected $primaryKey="id";

    public $fillable = [
        'name',
        'description',
        'qty_in_stock',
        'price_per_unit'
    ];
}
