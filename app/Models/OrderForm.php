<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    protected $table = 'order_forms';
    protected $fillable = ['order_id', 'user_id', 'name','address','date','phone','menu','total','pay'];

    public function productOrder()
    {
        // hasOne(關聯/對方的欄位/自己的欄位)
        return $this->hasMany(ProductOrder::class,'form_id','id');
    }
}

