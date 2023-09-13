<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';
    protected $fillable = ['form_id', 'qty', 'price', 'name', 'desc', 'image'];
    public function orderForm()
    {
        // hasOne(關聯/對方的欄位/自己的欄位)：我有子表，並且是一對一
        // belongsTo(一對一)(關聯，自己的欄位，對方的欄位)：自身身上記錄著他表的id
        return $this->belongsTo(OrderForm::class,'form_id');
    }

}
