<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

  
 public function productRel(){
    return $this->hasMany(Product::class,'id','product_id');
 }
    
    

    

}
