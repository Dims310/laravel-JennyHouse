<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function Cart(){
        return $this->hasMany(Cart::class);
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
}
