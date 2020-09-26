<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AttributeProduct;

class Attribute extends Model
{
    protected $table = 'attribute';

    protected $primaryKey = 'attribute_id';

    protected $fillable = [
        'name'
    ];

    public function attributeProduct()
    {
        return $this->hasMany(AttributeProduct::class, 'attribute_id', 'attribute_id');
    }
}
