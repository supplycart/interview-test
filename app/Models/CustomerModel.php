<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table="customer";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        "fname",
        "lname",
        "email",
        "password",
        "register_on"
    ];

}
