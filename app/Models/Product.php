<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'unit',
        'origin',
        'describe',
        'amount',
        'input_date',
        'expiration_date',
        'unit_price',
        'image'
    ];


}
