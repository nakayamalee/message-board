<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $table='products';
    protected $fillable=['name','image','price','status','desc'];


    public function cart() {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
