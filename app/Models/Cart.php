<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    function Product(){
        return $this->belongsTo(Product::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'product_title',
        'qty',
        'price',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';
    public $timestamps = true;
}
