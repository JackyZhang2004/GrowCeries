<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderList extends Model
{
    use HasFactory;

    protected $table = 'transactionDetail';
    protected $primaryKey = 'orderDetailId';

    protected $fillable = [
        'productId', 
        'quantity'
    ];

    public function order(){
        return $this->hasOne(orderList::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'productId', 'productId');
    }
}
