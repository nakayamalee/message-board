<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table='responses';
    protected $fillable=['response'];
    


    public function responseSent()
    {
        // hasOne(關聯/對方的欄位/自己的欄位)
        return $this->hasMany(ResponseSent::class,'response_id','id');
    }
}
