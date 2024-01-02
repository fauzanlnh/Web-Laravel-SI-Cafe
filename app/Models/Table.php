<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $guarded = ['id'];
    public function order()
    {
        return $this->hasMany(Order::class, 'table_number');
    }
}
