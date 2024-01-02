<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public function detailOrder()
    {
        // menu_id is foreign key in table order details
        return $this->hasMany(OrderDetail::class, 'menu_id');
    }
}
