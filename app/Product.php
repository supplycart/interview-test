<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\AttributeProduct;

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

    public function getImagePathAttribute()
    { 
        return (
            array_key_exists('full_file_name', $this->attributes)
            && (
                $this->attributes['full_file_name'] != null
                || $this->attributes['full_file_name'] != ''
            )
        )
            ? url('/stock-images/'.$this->full_file_name)
            : url('/stock-images/no-image-default.jpg');
    }

    public function attributeProduct()
    {
        return $this->hasMany(AttributeProduct::class, 'product_id', 'product_id');
    }
}
