<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['product_id', 'qty', 'user_id'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function product_withTrashed(){
        return $this->belongsTo(Product::class, 'product_id', 'id')->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
