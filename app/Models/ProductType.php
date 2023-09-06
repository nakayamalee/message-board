<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
  protected $table='product_types';
  protected $fillable=['name','desc'];

  public function productTypeImg()
  {
      // hasOne(關聯/對方的欄位/自己的欄位)
      return $this->hasMany(ProductTypeImg::class,'product_type_id','id');
  }
}

