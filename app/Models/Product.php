<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOrder;

class Product extends Model
{
    use HasFactory;
   

    public function productRel(){
        $this->hasMany(ProductOrder::class, 'id','product_id');
    }

    // public function catRel(){
    //     return $this->hasMany(Category::class, 'id', 'category_id');
    // }

   

}
