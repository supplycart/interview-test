<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;

class AttributeProduct extends Model
{
    protected $table = 'attribute_product';

    protected $primaryKey = 'attribute_product_id';

    protected $fillable = [
        'attribute_id',
        'product_id',
    ];

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_id', 'attribute_id');
    }
}
