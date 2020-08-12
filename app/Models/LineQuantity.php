<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineQuantity extends Model
{
    protected $table="line_quantity";

    public $timestamps = false;

    protected $fillable = [
        "order_id",
        "prod_id",
        "quantity"
    ];
}
