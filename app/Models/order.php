<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'transactionHeader';

    protected $fillable = [
        'orderId',
        'userId',
        'courierId',
        'orderDate',
        'orderStatus',
        'deliveryTime',
        'paymentMethod'
    ];


    public function orderList(){
        return $this->hasMany(orderList::class, 'orderId', 'orderId');
    }
}
