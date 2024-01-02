<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_number');
    }
    
    public function detailOrder()
    {
        // order_id is foreign key in table order details
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
