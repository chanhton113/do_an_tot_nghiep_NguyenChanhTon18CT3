<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','date_founded','address','phone','total','id_discount','payment','status'];

    public function user_info()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail','order_id');
    }

}
