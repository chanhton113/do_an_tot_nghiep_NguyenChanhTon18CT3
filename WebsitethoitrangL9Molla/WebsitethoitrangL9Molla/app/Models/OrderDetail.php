<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table='orders_detail';
    protected $fillable=[
        'order_id','product_id','amount','price',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
