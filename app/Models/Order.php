<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_phone',
        'food_id',
        'food_name',
        'quantity',
        'discount',
        'Price'
    ];
    public function food()
    {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }

}
