<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrder extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = ['order_id', 'user_phone'];
    public function getKeyType()
    {
        return 'string';
    }

    protected $fillable = [
        'user_phone',
        'delivery_address',
        'created_date',
        'price',
        'status',
    ];
}
