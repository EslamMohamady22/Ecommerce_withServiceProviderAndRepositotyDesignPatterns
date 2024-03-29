<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'order_details';
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function productcolorsize()
    {
        return $this->belongsTo(ProductColorSize::class);
    }

}
