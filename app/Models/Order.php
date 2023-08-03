<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderId';

    public function rProduct(){

        return $this->belongsToMany(Product::class,OrderDetail::class,'orderId','productId');

    }
}
