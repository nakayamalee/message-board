<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseSent extends Model
{
    protected $table='reponse_sents';
    protected $fillable=['re','response_id'];
}
