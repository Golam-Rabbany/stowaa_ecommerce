<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


public function orderRel(){
    return $this->hasMany(ProductOrder::class,'order_id','id');
}


public function userRel(){
    return $this->hasMany(User::class, 'id', 'user_id');
}




}
