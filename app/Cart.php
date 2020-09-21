<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Cart extends Model
{
    use SoftDeletes;

    protected $table = 'cart';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id', 'cart_id');
    }
}
