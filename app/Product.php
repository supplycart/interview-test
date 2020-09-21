<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
